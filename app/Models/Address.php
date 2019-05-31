<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\State;
use App\Models\City;

class Address extends Model
{
    protected $fillable = ['city_id', 'state_id', 'rua', 'url', 'number', 'neighborhood', 'complement', 'zipeCode'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('ordeByRua', function(Builder $builder) {
            $builder->orderBy('rua', 'desc');
        });
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
