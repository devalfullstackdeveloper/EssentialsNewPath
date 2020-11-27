<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportCsvReqeust extends FormRequest
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
            'csvfile'   => 'required|mimes:xls,xlsx,csv',
            'system'    => 'required',
            'loadtype'  =>  'required'
        ];
    }

    public function messages(){
        return [
            'csvfile.required'  => 'please upload file',
            'csvfile.mimes'     => 'Please upload only excel or csv file',
            'system.required'   =>  'Please Select System',
            'loadtype.required' =>  'Please Select Type of uploads'
        ];
    }
}
