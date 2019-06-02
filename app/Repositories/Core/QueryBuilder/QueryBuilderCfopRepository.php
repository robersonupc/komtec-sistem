<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CfopRepositoryInterface;

class QueryBuilderCfopRepository extends BaseQueryBuilderRepository implements CfopRepositoryInterface
{
    protected $table = 'cfops';

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
                                $query->orWhere('description', $data['description']);
                            }

                            if (isset($data['operacao'])) {
                                $query->orWhere('operacao', $data['operacao']);
                            }

                            if (isset($data['ent_sai'])) {
                                $query->orWhere('ent_sai', $data['ent_sai']);
                            }

                            if (isset($data['numseq'])) {
                                $query->orWhere('numseq', $data['numseq']);
                            }

                        })
                        ->orderBy('id', 'desc')
                        ->paginate(5);
    }

    public function store(array $data)
    {
        $data['url'] = kebab_case($data['description']);

        return $this->db->table($this->tb)
                    ->insert($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = kebab_case($data['description']);
        
        return $this->db->table($this->tb)
                    ->where('id', $id)
                    ->update($data);
    }

    public function productsByCfopId($id)
    {
        return $this->db
                        ->table('products')
                        ->where('cfop_id', $id)
                        ->get();
    }

}
