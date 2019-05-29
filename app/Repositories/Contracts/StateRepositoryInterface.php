<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface StateRepositoryInterface
{
    public function search(Request $request);
    public function addressesByStateId($id);
}
