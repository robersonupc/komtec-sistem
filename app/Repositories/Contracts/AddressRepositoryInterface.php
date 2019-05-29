<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface AddressRepositoryInterface
{
    public function search(Request $request);
}
