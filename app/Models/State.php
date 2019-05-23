<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class State extends Model
{
    protected $fillable = ['title', 'url', 'uf'];

    public function address()
    {
        return $this->hasMany(Address::class);
    }
   
}
