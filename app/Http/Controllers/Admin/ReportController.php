<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getCompetition()
    {
        return view('voyager::reports.competition-card');
    }

    public function getValedictorian()
    {
        return view('voyager::reports.valedictorian');
    }

    public function getKuy()
    {
        return view('voyager::reports.kuy');
    }

    public function getReferral()
    {
        return view('voyager::reports.referral');
    }

    public function getWorkoutConfirm()
    {
        return view('voyager::reports.workout-confirm');
    }

    public function getExamNotification()
    {
        return view('voyager::reports.exam_notification');
    }

    public function getInfoStudent(Request $request)
    {
        if (is_array($request->id)) {
            $list = Student::find($request->id);

            $list = collect($list)->map(function ($value, $key) {
                return $value->getAttributes();
            });
            return $list;
        }

        $query = Student::with('dojo')->find($request->id);
        $res = $query->getAttributes();
        $res['dojo'] = $query->dojo->name;
        return $res;
    }

    /**
     * Get view field
     */
    public function getContentFields(Request $request)
    {
        $id = $request->divCount;
        $varId = 'keyword_' . $id;
        return view("voyager::reports.keyword-fields", compact('id', 'varId'));
    }

    /**
     * Get view field
     */
    public function getTuitionFields(Request $request)
    {
        $id = $request->divCount;
        $varId = 'keyword_' . $id;
        return view("voyager::reports.tuition-fields", compact('id', 'varId'));
    }
}
