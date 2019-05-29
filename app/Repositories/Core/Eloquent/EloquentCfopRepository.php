<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Cfop;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\CfopRepositoryInterface;
use Illuminate\Http\Request;

class EloquentCfopRepository extends BaseEloquentRepository implements CfopRepositoryInterface
{
    public function entity()
    {
        return CFOP::class;
    }

    public function search(Request $request)
    {
        return $this->entity
                            ->where(function($query) use ($request) {
                                
                                if($request->code) {
                                    $filter = $request->code;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('code', 'LIKE', "%{$filter}%")
                                                        ->orWhere('description', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                        })
                        ->paginate(5);
    }
}
