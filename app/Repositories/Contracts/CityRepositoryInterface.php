<?php

namespace App\Repositories\Contracts;

interface CityRepositoryInterface
{
    public function search(array $data);
    public function addressesByCityId($id);
}
