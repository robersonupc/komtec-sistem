<?php

namespace App\Repositories\Contracts;

interface BrandRepositoryInterface
{
    public function search(array $data);
    public function productsByBrandId($id);
}
