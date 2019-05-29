<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\City;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\CityRepositoryInterface;
use Illuminate\Http\Request;

class EloquentCityRepository extends BaseEloquentRepository implements CityRepositoryInterface
{
    public function entity()
    {
        return City::class;
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
