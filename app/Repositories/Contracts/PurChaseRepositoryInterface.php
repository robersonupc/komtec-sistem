<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface PurChaseRepositoryInterface
{
    public function search(Request $request);
}
