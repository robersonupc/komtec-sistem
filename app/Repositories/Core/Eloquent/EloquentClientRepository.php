<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Client;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Http\Request;

class EloquentClientRepository extends BaseEloquentRepository implements ClientRepositoryInterface
{
    public function entity()
    {
        return Client::class;
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
