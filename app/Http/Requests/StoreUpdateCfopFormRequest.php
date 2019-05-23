<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCfopFormRequest extends FormRequest
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
            'codigo'         => "required",
            'numseq'         => "required",
            'description'    => "required|min:3|max:60,cfops,description,{$id},id",
            'ent_sai'        => "required",
            'operacao'       => "required",
            'descr_int'      => "",
            'url'            => "required|min:3|max:60|unique:cfops,url,{$id},id",
        ];
    }
}
