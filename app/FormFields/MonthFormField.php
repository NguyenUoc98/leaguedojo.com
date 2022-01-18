<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class MonthFormField extends AbstractHandler
{
    protected $codename = 'month';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('vendor.voyager.formfields.month', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}
