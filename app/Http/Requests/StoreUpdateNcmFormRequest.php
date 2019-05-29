<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\NcmController;

class StoreUpdateNcmFormRequest extends FormRequest
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
        $id = $this->segment(3);
        return [
            'code'            => "required|min:8|max:8|unique:ncms,code,{$id},id",
            'description'   => "required|min:3|max:255|unique:ncms,description,{$id},id",
        ];
    }
}
