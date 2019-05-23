<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ncm extends Model
{
    protected $fillable = ['code', 'description', 'url'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
