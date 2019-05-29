<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CityRepositoryInterface;

class QueryBuilderCityRepository extends BaseQueryBuilderRepository implements CityRepositoryInterface
{
    protected $table = 'cities';

    public function search(array $data)
    {
        return $this->db
                        ->table($this->tb)
                        ->where(function ($query) use ($data) {
                            if (isset($data['street'])) {
                                $query->where('street', $data['street']);
                            }

                            if (isset($data['url'])) {
                                $query->orWhere('url', $data['url']);
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
        $data['url'] = kebab_case($data['street']);

        return $this->db->table($this->tb)
                    ->insert($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = kebab_case($data['street']);
        
        return $this->db->table($this->tb)
                    ->where('id', $id)
                    ->update($data);
    }

    public function addressesByCityId($id)
    {
        return $this->db
                        ->table('cities')
                        ->where('city_id', $id)
                        ->get();
    }

}
