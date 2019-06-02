<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface StateRepositoryInterface
{
    public function search(array $data);
    public function addressesByStateId($id);
}
