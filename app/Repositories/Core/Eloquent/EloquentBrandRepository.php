<?php

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\BrandRepositoryInterface;
use App\Models\Brand;

class EloquentBrandRepository extends BaseEloquentRepository implements BrandRepositoryInterface
{
    public function entity()
    {
        return Brand::class;
    }

    public function search(array $data)
    {
        return $this->entity
                    ->where(function ($query) use ($data) {
                        if (isset($data['title'])) {
                            $query->where('title', $data['title']);
                        }

                        if (isset($data['url'])) {
                            $query->orWhere('url', $data['url']);
                        }

                        if (isset($data['description'])) {
                            $desc = $data['description'];
                            $query->where('description', 'LIKE', "%{$desc}%");
                        }
                    })
                    ->orderBy('id', 'desc')
                    ->paginate();
    }
}
