<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\PurChase;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\PurChaseRepositoryInterface;
use Illuminate\Http\Request;

class EloquentPurChaseRepository extends BaseEloquentRepository implements PurChaseRepositoryInterface
{
    public function entity()
    {
        return PurChase::class;
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
