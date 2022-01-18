<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'max:30',
            'name'      => 'max:15',
            'phone'     => 'numeric|digits_between:1,15',
            'CMND'      => 'nullable|numeric',
            'weight'    => 'numeric|between:20,129.9',
            'height'    => 'integer|min:100|max:200',
            'link_fb'   => 'nullable|active_url',
            'birthday'  => 'date_format:d-m-Y|after:1900-01-01|before:today'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'birthday.date_format' => 'Ngày sinh phải có dạng 01-12-1998',
            'birthday.after'       => 'Ngày sinh phải là một ngày sau ngày 01-01-1900',
            'birthday.before'      => 'Ngày sinh phải là một ngày trước ngày hôm nay',
        ];
    }

    /**
     * Set custom attribute names for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'last_name' => 'Họ và tên đệm',
            'name'      => 'Tên',
            'phone'     => 'Sô điện thoại',
            'CMND'      => 'Số CMND',
            'weight'    => 'Cân nặng',
            'height'    => 'chiều cao',
            'address'   => 'Địa chỉ',
            'link_fb'   => 'Link facebook',
            'birthday'  => 'Ngày sinh'
        ];
    }
}
