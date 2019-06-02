<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CFOP extends Model
{
    protected $fillable = ['code', 'numseq', 'description', 'ent_sai', 'operacao', 'descr_int', 'url'];
}
