<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\AddressRepositoryInterface;

class QueryBuilderAddressRepository extends BaseQueryBuilderRepository implements AddressRepositoryInterface
{
    protected $table = 'addresses';

    public function search(array $data)
    {
        return $this->db
                        ->table($this->tb)
                        ->where(function ($query) use ($data) {
                            if (isset($data['street'])) {
                                $query->where('street', $data['street']);
                            }

                            if (isset($data['zipeCode'])) {
                                $query->orWhere('zipeCode', $data['zipeCode']);
                            }

                            if (isset($data['neighborhood'])) {
                                $desc = $data['neighborhood'];
                                $query->where('neighborhood', 'LIKE', "%{$desc}%");
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(5);
    }

    
}
