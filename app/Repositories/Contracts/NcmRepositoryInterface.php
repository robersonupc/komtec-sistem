<?php

namespace App\Repositories\Contracts;

interface NcmRepositoryInterface
{
    public function search(array $data);
    public function productsByNcmId($id);
}
