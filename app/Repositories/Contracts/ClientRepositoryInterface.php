<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface ClientRepositoryInterface
{
    public function search(Request $request);
}
