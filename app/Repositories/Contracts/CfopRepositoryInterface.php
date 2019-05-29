<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CfopRepositoryInterface
{
    public function search(Request $request);
}
