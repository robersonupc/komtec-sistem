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
            'name'                 => "required|min:3|max:60|unique:products,name,{$id},id",
            'code'                 => "required|min:5|max:20|unique:products,code,{$id},id",
            'ncm_id'               => 'required|exists:ncms,id',
            'category_id'          => 'required|exists:categories,id',
            'brand_id'             => 'required|exists:brands,id',
            'codeManufacturer'     => "required",
            'pricePurchase'        => "required",
            'margin'               => "required",
            'priceSale'            => "required",
            'qty'                  => "required",
            'url'                  => "required|min:3|max:60|unique:products,url,{$id},id",
            'note'                 => 'max:9000',
        ];
    }
}
