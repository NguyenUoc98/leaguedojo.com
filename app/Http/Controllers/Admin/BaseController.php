<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BaseExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use TCG\Voyager\Facades\Voyager;

class BaseController extends Controller
{
    public function getSlug(Request $request)
    {
        if (isset($this->slug)) {
            $slug = $this->slug;
        } else {
            $slug = explode('.', $request->route()->getName())[0];
        }

        return $slug;
    }

    public function getSlug1(Request $request)
    {
        if (isset($this->slug)) {
            $slug = $this->slug;
        } else {
            $slug = explode('.', $request->route()->getName())[1];
        }

        return $slug;
    }

    /**
     * Get BREAD relations data.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function relation(Request $request)
    {
        $slug = $this->getSlug($request);
        $page = $request->input('page');
        $on_page = 50;
        $search = $request->input('search', false);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        if (count($request->label) == 1) {
            $label = $request->label[0];
        } else {
            $label = "CONCAT_WS(' '";
            foreach ($request->label as $column) {
                $label .= ',' . $column;
            }
            $label .= ')';
        }

        $rows = $request->input('method', 'add') == 'add' ? $dataType->addRows : $dataType->editRows;
        foreach ($rows as $key => $row) {
            $skip = $on_page * ($page - 1);

            // If search query, use LIKE to filter results depending on field label
            if(isset($request->foreign)) {
                if ($search) {
                    $total_count = app($dataType->model_name)->whereNull($request->foreign)->where(DB::raw($label), 'LIKE', '%' . $search . '%')->count();
                    $relationshipOptions = app($dataType->model_name)->whereNull($request->foreign)->take($on_page)->skip($skip)
                        ->where(DB::raw($label), 'LIKE', '%' . $search . '%')
                        ->get();
                } else {
                    $total_count = app($dataType->model_name)->whereNull($request->foreign)->count();
                    $relationshipOptions = app($dataType->model_name)->whereNull($request->foreign)->take($on_page)->skip($skip)->get();
                }
            } else {
                if ($search) {
                    $total_count = app($dataType->model_name)->where(DB::raw($label), 'LIKE', '%'.$search.'%')->count();
                    $relationshipOptions = app($dataType->model_name)->take($on_page)->skip($skip)
                        ->where(DB::raw($label), 'LIKE', '%'.$search.'%')
                        ->get();
                } else {
                    $total_count = app($dataType->model_name)->count();
                    $relationshipOptions = app($dataType->model_name)->take($on_page)->skip($skip)->get();
                }
            }
            

            $results = [];

            if (!$row->required && !$search) {
                $results[] = [
                    'id'   => '',
                    'text' => __('voyager::generic.none'),
                ];
            }

            foreach ($relationshipOptions as $relationshipOption) {
                $text = '';
                if (count($request->label) == 1) {
                    $text = $relationshipOption->$label;
                } else {
                    if (isset($request->format)) {
                        $text = $request->format;
                        foreach ($request->label as $column) {
                            $text = str_replace($column, $relationshipOption->$column, $text);
                        }
                    } else {
                        foreach ($request->label as $column) {
                            $text .= $relationshipOption->$column . ' ';
                        }
                    }
                }
                $results[] = [
                    'id'   => $relationshipOption->id,
                    'text' => $text,
                ];
            }

            return response()->json([
                'results'    => $results,
                'pagination' => [
                    'more' => ($total_count > ($skip + $on_page)),
                ],
            ]);
        }

        // No result found, return empty array
        return response()->json([], 404);
    }

    /**
     * Add objects from belongsTo relationship
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function addRelation(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        foreach($dataType->browseRows as $row) {
            if ($row->type == 'relationship' && $row->details->type == 'belongsTo') {
                $column = $row->details->column;
                break;
            }
        }

        $action = true;
        foreach ($request->$slug as $object) {
            $object = app($dataType->model_name)::find($object);
            $object->$column = $request->$column;
            if (!$object->save()) {
                $action = false;
                break;
            }
        }

        if ($action) {
            return redirect()->back()->with([
                'message'    => 'Đã thêm vào danh sách',
                'alert-type' => 'success',
            ]);
        }
        return redirect()->back()->with([
            'message'    => 'Chưa thêm thành công',
            'alert-type' => 'error',
        ]);
    }

    /**
     * Export excel file
     * 
     * @param $id, $field
     * @return \Illuminate\Support\Collection
     */
    public function export(Request $request)
    {
        
        $choose = $request->choose;
        $fields = $request->fields;

        if($choose == 'all') {
            $ids = [];
        } else {
            $ids = explode(',',$request->ids);
        }

        $slug = $this->getSlug1($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        return Excel::download(new BaseExport($ids, $fields, $dataType->model_name), $slug . '.xlsx');
    }

}
