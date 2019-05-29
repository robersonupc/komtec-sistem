<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\FomaPgto;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\FomaPgtoRepositoryInterface;
use Illuminate\Http\Request;

class EloquentFomaPgtoRepository extends BaseEloquentRepository implements FomaPgtoRepositoryInterface
{
    public function entity()
    {
        return FomaPgto::class;
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
