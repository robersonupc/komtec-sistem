<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\ICMSController;

class StoreUpdateICMSFormRequest extends FormRequest
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
            'uf'            => "required|min:2|max:2|unique:icmss,uf,{$id},id",
            'description'   => "required|min:3|max:255|unique:icmss,description,{$id},id",
            'aliqicms'      => "required",            
            'url'           => "required|min:3|max:60|unique:icmss,url,{$id},id",
        ];
    }
}
