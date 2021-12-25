<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookRoom;
use App\Models\Room;
use App\Models\Student;
use App\Notifications\Notify;
use App\Notifications\RejectBookRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class UptimeController extends VoyagerBaseController
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Get view field
     */
    public function getCloneFields(Request $request)
    {
        $id = $request->divCount;
        $varId = 'removeId' . $id;
        return view("voyager::uptimes.dynamic-fields", compact('id', 'varId'));
    }

    public function insertUpdateData($request, $slug, $rows, $data)
    {
        $multi_select = [];

        /*
         * Prepare Translations and Transform data
         */
        $translations = is_bread_translatable($data)
            ? $data->prepareTranslations($request)
            : [];

        foreach ($rows as $row) {
            // if the field for this row is absent from the request, continue
            // checkboxes will be absent when unchecked, thus they are the exception
            if (!$request->hasFile($row->field) && !$request->has($row->field) && $row->type !== 'checkbox') {
                // if the field is a belongsToMany relationship, don't remove it
                // if no content is provided, that means the relationships need to be removed
                if (isset($row->details->type) && $row->details->type !== 'belongsToMany') {
                    continue;
                }
            }

            // Value is saved from $row->details->column row
            if ($row->type == 'relationship' && $row->details->type == 'belongsTo') {
                continue;
            }

            $content = $this->getContentBasedOnType($request, $slug, $row, $row->details);

            if ($row->type == 'relationship' && $row->details->type != 'belongsToMany') {
                $row->field = @$row->details->column;
            }

            /*
             * merge ex_images and upload images
             */
            if ($row->type == 'multiple_images' && !is_null($content)) {
                if (isset($data->{$row->field})) {
                    $ex_files = json_decode($data->{$row->field}, true);
                    if (!is_null($ex_files)) {
                        $content = json_encode(array_merge($ex_files, json_decode($content)));
                    }
                }
            }

            if (is_null($content)) {

                // If the image upload is null and it has a current image keep the current image
                if ($row->type == 'image' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the multiple_images upload is null and it has a current image keep the current image
                if ($row->type == 'multiple_images' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the file upload is null and it has a current file keep the current file
                if ($row->type == 'file') {
                    $content = $data->{$row->field};
                    if (!$content) {
                        $content = json_encode([]);
                    }
                }

                if ($row->type == 'password') {
                    $content = $data->{$row->field};
                }
            }

            if ($row->type == 'relationship' && $row->details->type == 'belongsToMany') {
                // Only if select_multiple is working with a relationship
                $multi_select[] = ['model' => $row->details->model, 'content' => $content, 'table' => $row->details->pivot_table];
            } else {
                $data->{$row->field} = $content;
            }
        }

        if (isset($data->additional_attributes)) {
            foreach ($data->additional_attributes as $attr) {
                if ($request->has($attr)) {
                    $data->{$attr} = $request->{$attr};
                }
            }
        }

        $uptimes = [];
        for ($i = 0; $i < count($request->start_at); $i++) {
            if ($request->start_at[$i] >= $request->end_at[$i]) {
                return redirect()->back()->with([
                    'message'    => 'Thời gian mở phải sớm hơn thời gian đóng cửa',
                    'alert-type' => 'error',
                ]);
            }
            $uptimes[$i] = [$request->start_at[$i], $request->end_at[$i]];
        }

        // Sắp xếp
        usort($uptimes, function ($time1, $time2) {
            if ($time1 == $time2)
                return 0;
            else if ($time1 > $time2)
                return 1;
            else
                return -1;
        });

        $data->uptimes = json_encode($uptimes);

        $applyDay = Carbon::now();

        // Nếu hôm nay không phải chủ nhật
        if ($applyDay->dayOfWeek > 0) {
            $applyDay->addWeek();
        }

        // Số ngày chênh lệch
        $addDay = $data->weekdays - $applyDay->dayOfWeek;
        $applyDay->addDays($addDay);

        // Nếu ngày đang cập nhật là chủ nhật thì cộng thêm 1 tuần
        if ($data->weekdays == 0) {
            $applyDay->addWeek();
        }

        $bookRoomed = BookRoom::where('room_id', $data->room_id)->whereDate('date', $applyDay)->where('confirmed', '<>', 'REJECTED')->get();

        foreach ($bookRoomed as $booked) {
            if (!$this->room->checkTime(json_decode($data->uptimes), $booked->start_at, $booked->end_at)) {
                $uptimes = json_decode($data->uptimes);
                $time = '';
                foreach ($uptimes as $uptime) {
                    $time .= 'từ ' . $uptime[0] . ' đến ' . $uptime[1] . ', ';
                }

                // Cập nhật trạng thái của lịch book phòng, thêm lý do từ chối
                $booked->update([
                    'confirmed' => 'REJECTED',
                    'reason_reject' => 'Thời gian hoạt động của phòng thay đổi: ' . $time,
                ]);

                $student = $booked->student;
                $room = $booked->room;

                // Tạo notification
                $notify = [
                    "text" => 'Phòng <b>' . $room->name . '</b> bạn book đã bị từ chối',
                    "img" => '/img/core-img/notification.png',
                    "icon" => '/img/core-img/icon-notify.png',
                    "href" => route('rooms.index'),
                    "time" => Carbon::now(),
                ];

                // Gửi thông báo
                Notification::send($student->user, new Notify($notify, 'book-room'));
                Notification::send($student->user, new RejectBookRoom($student->name, $room->name, $room->address, substr($booked->start_at, 0, -3), substr($booked->end_at, 0, -3), 'Thời gian hoạt động của phòng thay đổi như sau: ' . $time));
            }
        }

        $data->save();

        // Save translations
        if (count($translations) > 0) {
            $data->saveTranslations($translations);
        }

        foreach ($multi_select as $sync_data) {
            $data->belongsToMany($sync_data['model'], $sync_data['table'])->sync($sync_data['content']);
        }

        // Rename folders for newly created data through media-picker
        if ($request->session()->has($slug . '_path') || $request->session()->has($slug . '_uuid')) {
            $old_path = $request->session()->get($slug . '_path');
            $uuid = $request->session()->get($slug . '_uuid');
            $new_path = str_replace($uuid, $data->getKey(), $old_path);
            $folder_path = substr($old_path, 0, strpos($old_path, $uuid)) . $uuid;

            $rows->where('type', 'media_picker')->each(function ($row) use ($data, $uuid) {
                $data->{$row->field} = str_replace($uuid, $data->getKey(), $data->{$row->field});
            });
            $data->save();
            if ($old_path != $new_path && !Storage::disk(config('voyager.storage.disk'))->exists($new_path)) {
                $request->session()->forget([$slug . '_path', $slug . '_uuid']);
                Storage::disk(config('voyager.storage.disk'))->move($old_path, $new_path);
                Storage::disk(config('voyager.storage.disk'))->deleteDirectory($folder_path);
            }
        }

        return $data;
    }
}
