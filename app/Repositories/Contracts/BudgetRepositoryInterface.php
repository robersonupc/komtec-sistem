<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface BudgetRepositoryInterface
{
    public function search(Request $request);
}
