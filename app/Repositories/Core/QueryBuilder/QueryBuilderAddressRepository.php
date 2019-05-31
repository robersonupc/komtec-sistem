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
                            
                            if (isset($data['rua'])) {
                                $query->where('rua', $data['rua']);
                            }

                            if (isset($data['zipeCode'])) {
                                $desc = $data['zipeCode'];
                                $query->where('zipeCode', 'LIKE', "%{$desc}%");
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate();
    }

    public function store(array $data)
    {
        $data['url'] = kebab_case($data['rua']);

        return $this->db->table($this->tb)
                    ->insert($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = kebab_case($data['rua']);
        
        return $this->db->table($this->tb)
                    ->where('id', $id)
                    ->update($data);
    }

}
