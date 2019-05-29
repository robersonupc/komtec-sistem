<?php

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\NcmRepositoryInterface;
use App\Models\Ncm;

class EloquentNcmRepository extends BaseEloquentRepository implements NcmRepositoryInterface
{
    public function entity()
    {
        return Ncm::class;
    }

    public function search(array $data)
    {
        return $this->entity
                        ->where(function ($query) use ($data) {
                            if (isset($data['code'])) {
                                $query->where('code', $data['code']);
                            }

                            if (isset($data['url'])) {
                                $query->orWhere('url', $data['url']);
                            }

                            if (isset($data['description'])) {
                                $desc = $data['description'];
                                $query->where('description', 'LIKE', "%{$desc}%");
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate();
    }

    public function productsByNcmId($id)
    {
        return $this->db
                        ->table('products')
                        ->where('ncm_id', $id)
                        ->get();
    }
}
