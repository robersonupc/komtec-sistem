<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface SaleRepositoryInterface
{
    public function search(Request $request);
}
