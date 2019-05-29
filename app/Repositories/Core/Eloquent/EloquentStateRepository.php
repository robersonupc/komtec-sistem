<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\State;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\StateRepositoryInterface;
use Illuminate\Http\Request;

class EloquentStateRepository extends BaseEloquentRepository implements StateRepositoryInterface
{
    public function entity()
    {
        return State::class;
    }

    public function search(Request $request)
    {
        return $this->entity
                            ->where(function($query) use ($request) {
                                
                                if($request->title) {
                                    $filter = $request->title;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('title', 'LIKE', "%{$filter}%")
                                                        ->orWhere('url', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                        })
                        ->paginate(5);
    }
}
