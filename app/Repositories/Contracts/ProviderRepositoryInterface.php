<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface ProviderRepositoryInterface
{
    public function search(Request $request);
}
