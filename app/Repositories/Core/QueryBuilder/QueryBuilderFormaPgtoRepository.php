<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\FormaPgtoRepositoryInterface;

class QueryBuilderFormaPgtoRepository extends BaseQueryBuilderRepository implements FormaPgtoRepositoryInterface
{
    protected $table = 'formapgtos';

    public function search(array $data)
    {
        return $this->db
                        ->table($this->tb)
                        ->where(function ($query) use ($data) {
                            if (isset($data['description'])) {
                                $query->where('description', $data['description']);
                            }

                            if (isset($data['parcela'])) {
                                $query->orWhere('parcela', $data['parcela']);
                            }

                            if (isset($data['prazoinicial'])) {
                                $query->orWhere('prazoinicial', $data['prazoinicial']);
                            }

                            if (isset($data['diasentreparcelas'])) {
                                $query->orWhere('diasentreparcelas', $data['diasentreparcelas']);
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

    //public function productsByCfopId($id)
    //{
    //    return $this->db
    //                    ->table('products')
    //                    ->where('cfop_id', $id)
    //                    ->get();
    //}

}
