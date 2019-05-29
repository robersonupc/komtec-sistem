<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CityRepositoryInterface
{
    public function search(Request $request);
    public function addressesByCityId($id);
}
