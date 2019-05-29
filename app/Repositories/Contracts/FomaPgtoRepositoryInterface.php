<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface FomaPgtoRepositoryInterface
{
    public function search(Request $request);
}
