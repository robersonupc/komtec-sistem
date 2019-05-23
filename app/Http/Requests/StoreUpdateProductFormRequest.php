<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\ProductController;

class StoreUpdateProductFormRequest extends FormRequest
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
            'description'          => "required|min:3|max:60|unique:products,description,{$id},id",
            'code'                 => "required|min:5|max:20|unique:products,code,{$id},id",
            'ncm_id'               => 'exists:ncms,id',
            'category_id'          => 'exists:categories,id',
            'brand_id'             => 'exists:brands,id',
            'codeManufacturer'     => "required",
            'pricePurchase'        => "required",
            'margin'               => "required",
            'priceSale'            => "required",
            'qty'                  => "required",
            'url'                  => "required|min:3|max:60|unique:products,url,{$id},id",
            'note'                 => 'max:2000',
        ];
    }
}
