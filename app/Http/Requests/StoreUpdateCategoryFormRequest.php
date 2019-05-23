<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\CategoryController;

class StoreUpdateCategoryFormRequest extends FormRequest
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
            'title'         => "required|min:3|max:60|unique:brands,title,{$id},id",
            'url'           => "required|min:3|max:60|unique:brands,url,{$id},id",
            'description'   => 'max:2000',
        ];
    }
}
