<?php

namespace App\Models;

use App\Models\Dojo;
use App\Models\TestScore;
use App\Traits\FormLayoutTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class Student extends Model
{
    use FormLayoutTrait;

    protected $perPage = 10;

    private $now;
    private $startSemester;

    public function __construct()
    {
        $this->now = Carbon::now()->format('Y-m-d');
        $this->startSemester = Carbon::createFromFormat('d/m', setting('app.deadline_point'))->format('Y-m-d');
        if ($this->now <= $this->startSemester) {
            $this->startSemester = Carbon::parse($this->startSemester)->subYear()->format('Y-m-d');
        }
    }

    public static $methodField = [
        'goldMedal' => 'Huy chương vàng',
        'silverMedal' => 'Huy chương bạc',
        'bronzeMedal' => 'Huy chương đồng',
        'mediumScore' => 'Điểm thi TB',
        'valedictorian' => 'Thủ khoa',
        'pointCollected' => 'Điểm sự kiện',
        'diligence' => 'Số buổi nghỉ'
    ];

    /**
     * Custom paginate collection
     */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (PaginationPaginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'image', 'name', 'phone', 'cmnd', 'birthday', 'address', 'homeland', 'type', 'work_unit', 'kuy', 'weight', 'height', 'sex',
        'link_fb', 'admission_day', 'dojo_id', 'diligence', 'status',
    ];

    public function getImageAttribute($value)
    {
        return $value ?? 'students/default.png';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class)->withDefault([
            'image' => 'users/default.png',
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dojo()
    {
        return $this->belongsTo(Dojo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class)->withPivot('used');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'attends')->orderByDesc('date')->orderBy('start_at')->withPivot('confirmed');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'book_rooms')->orderByDesc('book_rooms.date')->orderBy('book_rooms.start_at')->withPivot('id','confirmed', 'date', 'start_at', 'end_at', 'reason_reject');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tuitions()
    {
        return $this->hasMany(Tuition::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transferDojos()
    {
        return $this->hasMany(TransferDojo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testScores()
    {
        return $this->hasMany(TestScore::class);
    }

    /**
     * Set Formdield for Student Details
     */
    public function formFieldsDetails()
    {
        $this->elements = [];
        return $this->field('name', 6)->field('student_belongsto_dojo_relationship', 6)
            ->field('cmnd', 4)->field('phone', 4)->field('birthday', 4)
            ->field('height', 4)->field('weight', 4)->field('sex', 4)
            ->field('type', 4)->field('admission_day', 4)->field('status', 4)
            ->field('work_unit', 6)->field('homeland', 6)
            ->field('address', 12)
            ->field('link_fb', 12)->get();
    }

    /**
     * Set Formdield for Student Achievements
     */
    public function formFieldsScore()
    {
        $this->elements = [];
        return $this->field('diligence', 12)->field('kuy', 12)->get();
    }

    /**
     * Get events not sign
     * 
     * @return Collection
     */
    public function eventNotSign(array $signed)
    {
        return Event::whereNotIn('id', $signed)->where('date', '>', $this->startSemester)->where('date', '<=', $this->now)->get();
    }

    /**
     * Get events signed
     * 
     * @return Collection
     */
    public function eventSigneds()
    {
        return $this->events->where('date', '>', $this->startSemester)->where('date', '<=', $this->now);
    }

    /**
     * Get point collected from events joined
     * 
     * @return Integer
     */
    public function pointCollected()
    {
        $point = 0;
        foreach ($this->eventSigneds() as $event) {
            if ($event->pivot->confirmed == 'CONFIRMED') {
                $point += $event->point;
            }
        }
        return $point;
    }

    /**
     * Get count of medal for each type
     * 
     * @return array
     */
    public function countMedal()
    {
        $achievements = $this->achievements->where('date', '>', $this->startSemester)->where('date', '<=', $this->now);
        $test = collect($achievements)->map(function ($value, $key) {
            return  $value['medal'];
        });

        return array_count_values($test->toArray());
    }

    /**
     * Get medium test score
     * 
     * @return Integer
     */
    public function mediumScore()
    {
        $point = 0;
        $valedictorian = 0;
        $sub = 4;
        if ($this->kuy >= 7 && $this->kuy <= 10) {
            $sub = 3;
        }
        $tests = $this->testScores->where('test_day', '>', $this->startSemester)->where('test_day', '<=', $this->now);
        foreach ($tests as $test) {
            $point += $test->total / $sub;
            if ($test->valedictorian) {
                $valedictorian++;
            }
        }

        return ['point' => (count($tests) != 0) ? round($point / count($tests), 2) : 0, 'valedictorian' => $valedictorian];
    }

    /**
     * Get information of point training
     * 
     * @return array
     */
    public function getPointTraining()
    {
        $pointTraining = [];
        $medal = $this->countMedal();

        // Tính số huy chương trong khoảng thời gian
        $pointTraining['goldMedal'] = $medal['GOLD'] ?? 0;
        $pointTraining['silverMedal'] = $medal['SILVER'] ?? 0;
        $pointTraining['bronzeMedal'] = $medal['BRONZE'] ?? 0;

        // Tính điểm thi thăng đai trung bình trong khoảng thời gian
        $pointTraining['mediumScore'] = $this->mediumScore()['point'];
        $pointTraining['valedictorian'] = $this->mediumScore()['valedictorian'];

        // Tổng điểm rèn luyện
        $pointTraining['pointCollected'] = $this->pointCollected();

        // Kiểm tra số buổi nghỉ
        $pointTraining['diligence'] = $this->diligence;

        $pointTraining['startSemester'] = date_create($this->startSemester)->format('d/m/Y');

        //Tổng điểm
        $pointTraining['total'] = $pointTraining['goldMedal'] * setting('app.goldMedal')
            + $pointTraining['silverMedal'] * setting('app.silverMedal')
            + $pointTraining['bronzeMedal'] * setting('app.bronzeMedal')
            + $pointTraining['mediumScore'] * setting('app.mediumScore')
            + $pointTraining['valedictorian'] * setting('app.valedictorian')
            + $pointTraining['pointCollected'] * setting('app.pointCollected')
            + $pointTraining['diligence'] * setting('app.diligence');

        return $pointTraining;
    }

    /**
     * Get ranking results
     */
    public function rankResults($perPage = 10)
    {
        $students = $this->whereStatus('STUDYING')->with('User')->get();
        $array = $students->map(function ($value, $index) {
            return ['student_id' => $value->id, 'name' => $value->name, 'sex' => $value->sex, 'avatar' => $value->user->avatar, 'result' => $value->getPointTraining()];
        })->toArray();

        usort($array, function ($student1, $student2) {
            if ($student2['result']['total'] - $student1['result']['total'] != 0) {
                return $student2['result']['total'] - $student1['result']['total'];
            }

            if ($student2['result']['valedictorian'] - $student1['result']['valedictorian'] != 0) {
                return $student2['result']['valedictorian'] - $student1['result']['valedictorian'];
            }

            if ($student2['result']['pointCollected'] - $student1['result']['pointCollected'] != 0) {
                return $student2['result']['pointCollected'] - $student1['result']['pointCollected'];
            }

            if ($student2['result']['goldMedal'] - $student1['result']['goldMedal'] != 0) {
                return $student2['result']['goldMedal'] - $student1['result']['goldMedal'];
            }

            if ($student2['result']['silverMedal'] - $student1['result']['silverMedal'] != 0) {
                return $student2['result']['silverMedal'] - $student1['result']['silverMedal'];
            }

            if ($student2['result']['bronzeMedal'] - $student1['result']['bronzeMedal'] != 0) {
                return $student2['result']['bronzeMedal'] - $student1['result']['bronzeMedal'];
            }

            if ($student2['result']['mediumScore'] - $student1['result']['mediumScore'] != 0) {
                return $student2['result']['mediumScore'] - $student1['result']['mediumScore'];
            }

            return $student1['result']['diligence'] - $student2['result']['diligence'];
        });

        if ($perPage > 0) {
            return $this->paginate(collect($array), $perPage);
        }

        return collect($array);
    }
}
