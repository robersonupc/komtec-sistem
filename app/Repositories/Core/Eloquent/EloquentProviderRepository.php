<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Provider;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ProviderRepositoryInterface;
use Illuminate\Http\Request;

class EloquentProviderRepository extends BaseEloquentRepository implements ProviderRepositoryInterface
{
    public function entity()
    {
        return Provider::class;
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
