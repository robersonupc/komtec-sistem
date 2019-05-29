<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Budget;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\BudgetRepositoryInterface;
use Illuminate\Http\Request;

class EloquentBudgetRepository extends BaseEloquentRepository implements BudgetRepositoryInterface
{
    public function entity()
    {
        return Budget::class;
    }

    public function search(Request $request)
    {
        return $this->entity
                            ->where(function($query) use ($request) {
                                
                                if($request->description) {
                                    $filter = $request->description;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('description', 'LIKE', "%{$filter}%")
                                                        ->orWhere('parcela', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                        })
                        ->paginate(5);
    }
}
