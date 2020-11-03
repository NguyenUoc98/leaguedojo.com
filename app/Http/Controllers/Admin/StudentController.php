<?php

namespace App\Http\Controllers\Admin;

use App\Imports\StudentsImport;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class StudentController extends VoyagerBaseController
{    
    /**
     * Get all vouchers student collected and haven't used yet
     * 
     * @param  \App\Http\Requests\StudentRequest  $request
     */
    public function getVouchers(Request $request)
    {
        return Student::find($request->student_id)->vouchers()->wherePivot('used', 0)->orderBy('type')->get();
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        try {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
        } catch (Exception $e) {
            $message = $e->getMessage();
            if (strpos($message, 'Duplicate entry') !== false) {
                $message = 'Trùng lặp bản ghi';
            }
            return redirect()->back()->with([
                'message'    => $message,
                'alert-type' => 'error',
            ]);
        }

        $sub = $data->id % 10000;
        $year = ($data->id - $sub) / 10000;

        if($year == Carbon::now()->year) {
            $id = $year * 10000 + ($data->id % 10000);
        } else {
            $id = Carbon::now()->year * 10000 + 1;
        }

        $data->update([
            'id' => $id,
        ]);

        event(new BreadDataAdded($dataType, $data));

        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }

    /**
     * Import file excel
     * 
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        try {
            Excel::import(new StudentsImport, request()->file('import-file'));
        } catch (Exception $e) {
            return back()->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ]);
        }

        return back()->with([
            'message'    => 'Nhập thành công',
            'alert-type' => 'success',
        ]);
    }
}
