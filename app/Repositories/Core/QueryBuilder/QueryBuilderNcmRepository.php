<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\NcmRepositoryInterface;

class QueryBuilderNcmRepository extends BaseQueryBuilderRepository implements NcmRepositoryInterface
{
    protected $table = 'ncms';

    public function search(array $data)
    {
        return $this->db
                        ->table($this->tb)
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

    public function store(array $data)
    {
        $data['url'] = kebab_case($data['code']);

        return $this->db->table($this->tb)
                    ->insert($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = kebab_case($data['code']);
        
        return $this->db->table($this->tb)
                    ->where('id', $id)
                    ->update($data);
    }

    public function productsByNcmId($id)
    {
        return $this->db
                        ->table('products')
                        ->where('ncm_id', $id)
                        ->get();
    }

}
