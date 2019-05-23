<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ncm_id', 'category_id', 'brand_id', 'name', 'qty', 'code', 'codeManufacturer', 'url', 'pricePurchase', 'margin', 'priceSale', 'note' ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ncm()
    {
        return $this->belongsTo(Ncm::class);
    }
}
