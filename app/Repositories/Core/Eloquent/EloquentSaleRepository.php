<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Sale;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\SaleRepositoryInterface;
use Illuminate\Http\Request;

class EloquentSaleRepository extends BaseEloquentRepository implements SaleRepositoryInterface
{
    public function entity()
    {
        return Sale::class;
    }

    public function search(Request $request)
    {
        return $this->entity
                            ->where(function($query) use ($request) {
                                
                                if($request->number) {
                                    $filter = $request->number;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('number', 'LIKE', "%{$filter}%")
                                                        ->orWhere('client', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                        })
                        ->paginate(5);
    }
}
