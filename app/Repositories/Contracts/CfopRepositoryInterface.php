<?php

namespace App\Repositories\Contracts;

interface CfopRepositoryInterface
{
    public function search(array $data);
    public function productsByCfopId($id);
}
