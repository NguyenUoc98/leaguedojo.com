<?php

namespace App\Http\Controllers\Admin\Voyager;

use App\Models\Document;
use App\Models\Dojo;
use App\Models\OperationLog;
use App\Models\Post;
use App\Models\StudentVoucher;
use App\Models\Tuition;
use App\Models\Video;
use App\Models\Voucher;
use App\Models\WorkoutRegistration;
use App\User;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;

class VoyagerController extends BaseVoyagerController
{
    public function index()
    {
        $fillColors = [
            "#2dce89", // xanh lá
            "#5e72e4", // xanh đậm
            "#11cdef", // xanh nhạt
            "#ffc107", // vàng
            "#fb6340"  // đỏ
        ];

        // User Chart
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
            ->get();
        $userCounted = $users->countBy(function ($user) {
            return date_create($user->created_at)->format('m');
        });
        $userArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($userCounted->all() as $index => $value) {
            $userArray[$index - 1] = $value;
        }
        $userChart['title'] = 'Số lượng tài khoản đăng ký mới năm ' . date('Y');
        $userChart['userArray'] = $userArray;


        // Số lượng người truy cập
        $operations = OperationLog::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->select(DB::raw('*,MONTH(created_at) as month'))
            ->get()->groupBy(['month', 'user_id']);
        $operationArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($operations as $index => $value) {
            $operationArray[$index - 1] = count($value);
        }
        $operationChart['title'] = 'Số người truy cập năm ' . date('Y');
        $operationChart['operationArray'] = $operationArray;


        // Workout Registration Chart
        $workoutRegistrations = WorkoutRegistration::with('dojo')->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
            ->get()->sortBy('dojo_id')->groupBy('dojo_id');
        $workoutCounted = $workoutRegistrations->map(function ($workouts) {
            return ['name' => $workouts->toArray()[0]['dojo']['name'], 'data' => $workouts->countBy(function ($workout) {
                return date_create($workout->created_at)->format('m');
            })->all()];
        });
        $workoutChart['title'] = 'Số lượng võ sinh đăng ký mới năm ' . date('Y');
        foreach ($workoutCounted as $dojo_id => $workouts) {
            $workoutData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            foreach ($workouts['data'] as $index => $value) {
                $workoutData[$index - 1] = $value;
            }
            $workoutChart['data'][$workouts['name']] = $workoutData;
        }


        // News Chart
        $posts = Post::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
            ->get();
        $postCounted = $posts->countBy(function ($post) {
            return date_create($post->updated_at)->format('m');
        });
        $postArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($postCounted->all() as $index => $value) {
            $postArray[$index - 1] = $value;
        }
        $videos = Video::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
            ->get();
        $videoCounted = $videos->countBy(function ($video) {
            return date_create($video->updated_at)->format('m');
        });
        $videoArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($videoCounted->all() as $index => $value) {
            $videoArray[$index - 1] = $value;
        }
        $documents = Document::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
            ->get();
        $documentCounted = $documents->countBy(function ($document) {
            return date_create($document->updated_at)->format('m');
        });
        $documentArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($documentCounted->all() as $index => $value) {
            $documentArray[$index - 1] = $value;
        }
        $newsChart['title'] = 'Tin tức đăng tải trong năm ' . date('Y');
        $newsChart['post'] = $postArray;
        $newsChart['video'] = $videoArray;
        $newsChart['doc'] = $documentArray;


        // Voucher Chart
        $vouchers = Voucher::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->select(DB::raw('*,MONTH(created_at) as month'))
            ->get()->groupBy('month');
        $totalArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $collectedArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($vouchers as $month => $voucher) {
            $total = 0;
            $collected = 0;
            foreach ($voucher as $value) {
                $total += $value->amount;
                $collected += $value->used;
            }
            $totalArray[$month - 1] = $total;
            $collectedArray[$month - 1] = $collected;
        }


        // Tổng số đã sử dụng
        $voucherUsed = StudentVoucher::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->where('used', 1)->select(DB::raw('*,MONTH(created_at) as month'))
            ->get()->groupBy('month');
        $usedArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $moneyReductioneyArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($voucherUsed as $index => $value) {
            $usedArray[$index - 1] = count($value);
            $money_reduction = 0;
            foreach($value as $val) {
                $money_reduction += $val->money_reduction;
            }
            $moneyReductioneyArray[$index - 1] = $money_reduction;
        }
        $voucherChart['title'] = 'Thống kê mã giảm giá năm ' . date('Y');
        $voucherChart['total'] = $totalArray;
        $voucherChart['collected'] = $collectedArray;
        $voucherChart['used'] = $usedArray;


        // Số tiền chi cho mã giảm giá
        $voucher1Chart['title'] = 'Thống kê mã giảm giá năm ' . date('Y');
        $voucher1Chart['moneyReductioneyArray'] = $moneyReductioneyArray;



        // Tuitions Chart
        $tuitionData = Tuition::with('student')->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->where('status', 'SUCCESS')->select(DB::raw('*,MONTH(created_at) as month'))
            ->get()->groupBy([function ($tuition, $key) {
                return $tuition->student->dojo->name;
            }, 'month']);
        $tuitionsChart['title'] = 'Thống kê học phí năm ' . date('Y');
        
        $tuitionInfo = [];
        $dojos = Dojo::all();
        foreach ($dojos as $dojo) {
            $tuitionInfo[$dojo->name] = 0;
        }

        $tuitionsChart['data'] = [];
        foreach ($tuitionData as $dojo => $months) {
            $tuitionArray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            foreach ($months as $month => $tuitions) {
                foreach ($tuitions as $tuition) {
                    $tuitionArray[$month - 1] += $tuition->amount;
                    $tuitionInfo[$dojo] += $tuition->amount;
                }
            }
            $tuitionsChart['data'][$dojo] = $tuitionArray;
        }


        return Voyager::view('voyager::index', compact('userChart', 'workoutChart', 'voucherChart', 'voucher1Chart', 'tuitionsChart', 'tuitionInfo', 'operationChart', 'newsChart'));
    }
}
