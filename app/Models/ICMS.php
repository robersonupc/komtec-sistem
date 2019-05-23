<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICMS extends Model
{
    protected $fillable = ['uf', 'description', 'aliqicms', 'url'];
}
