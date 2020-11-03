<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Voyager\VoyagerBaseController;
use App\Models\Voucher;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;

class VoucherController extends VoyagerBaseController
{
    protected $voucher;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
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

        $find = $this->voucher->where('code', $request->code)->get();

        if (count($find) > 0) {
            return redirect()->back()->with([
                'message'    => "Mã code đã tồn tại",
                'alert-type' => 'warning',
            ]);
        } else {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
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
    }
}
