<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\BudgetRepositoryInterface;

class QueryBuilderBudgetRepository extends BaseQueryBuilderRepository implements BudgetRepositoryInterface
{
    protected $table = 'budgets';

    public function search(array $data)
    {
        return $this->db
                        ->table($this->tb)
                        ->where(function ($query) use ($data) {
                            if (isset($data['title'])) {
                                $query->where('title', $data['title']);
                            }

                            if (isset($data['url'])) {
                                $query->orWhere('url', $data['url']);
                            }

                            if (isset($data['uf'])) {
                                $desc = $data['uf'];
                                $query->where('uf', 'LIKE', "%{$desc}%");
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate();
    }

    public function store(array $data)
    {
        $data['url'] = kebab_case($data['title']);

        return $this->db->table($this->tb)
                    ->insert($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = kebab_case($data['title']);
        
        return $this->db->table($this->tb)
                    ->where('id', $id)
                    ->update($data);
    }

    public function addressesByStateId($id)
    {
        return $this->db
                        ->table('addresses')
                        ->where('state_id', $id)
                        ->get();
    }

}
