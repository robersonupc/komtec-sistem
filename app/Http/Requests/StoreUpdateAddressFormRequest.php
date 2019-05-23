<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAddressFormRequest extends FormRequest
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
            'street'         => "required|min:3|max:60|unique:addresses,street,{$id},id",
            'url'            => "required|min:3|max:60|unique:addresses,url,{$id},id",
            'number'         => "required|min:1|max:6,{$id},id",
            'neighborhood'   => "required|min:3|max:60|unique:addresses,neighborhood,{$id},id",
            'complement'     => "max:9000",
            'city_id'        => 'required',
            'state_id'       => 'required',
            'zipeCode'        => 'required|minn:8|max:8',
        ];
    }
}
