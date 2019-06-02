<?php

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\CityRepositoryInterface;
use App\Models\City;

class EloquentCityRepository extends BaseEloquentRepository implements CityRepositoryInterface
{
    public function entity()
    {
        return City::class;
    }

    public function search(array $data)
    {
        return $this->entity
                        ->where(function ($query) use ($data) {
                            if (isset($data['title'])) {
                                $query->where('title', $data['title']);
                            }

                            if (isset($data['url'])) {
                                $query->orWhere('url', $data['url']);
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate();
    }

    public function addressesByCityId($id)
    {
        return $this->db
                        ->table('addresses')
                        ->where('cityy_id', $id)
                        ->get();
    }
}
