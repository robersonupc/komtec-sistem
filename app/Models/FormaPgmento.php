<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPgmento extends Model
{
    protected $fillable = ['description', 'parcela', 'prazoinicial', 'diasentreparcelas', 'url'];
}
