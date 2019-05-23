<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\CategoryController;

class StoreUpdateFormapgtoFormRequest extends FormRequest
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
            'description'        => "required|min:3|max:60|unique:formapgtos,description,{$id},id",
            'parcela'            => "required|min:3|max:60|unique:formapgtos,parcela,{$id},id",
            'parcela'            => "required",
            'prazoinicial'       => "required",
            'diasentreparcelas'  => "required",
            'url'                => "required|min:3|max:60|unique:formapgtos,url,{$id},id",
        ];
    }
}
