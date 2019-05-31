<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Address;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\AddressRepositoryInterface;
use Illuminate\Http\Request;

class EloquentAddressRepository extends BaseEloquentRepository implements AddressRepositoryInterface
{
    public function entity()
    {
        return Address::class;
    }

    public function search(Request $request)
    {
        return $this->entity
                            ->where(function($query) use ($request) {
                                
                                if($request->rua) {
                                    $filter = $request->rua;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('rua', 'LIKE', "%{$filter}%")
                                                        ->orWhere('zipeCode', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                                if($request->zipeCode) {
                                    $filter = $request->zipeCode;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('zipeCode', 'LIKE', "%{$filter}%")
                                                        ->orWhere('zipeCode', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                                if($request->city) {
                                    $query->orWhere('city_id', $request->city);
                                }
                                if($request->state) {
                                    $query->orWhere('state_id', $request->state);
                                }
                        })
                        ->paginate(5);
    }
}
