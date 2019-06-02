<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Ncm;
use App\Models\Brand;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(
            'admin.products.*',
            function($view){
                $view->with('categories', Category::pluck('title', 'id'));
                $view->with('ncms', Ncm::pluck('code', 'id'));
                $view->with('brands', Brand::pluck('title', 'id'));
            }
        );

        view()->composer(
            'admin.addresses.*',
            function($view){
                $view->with('cities', City::pluck('title', 'id'));
                $view->with('states', State::pluck('title', 'id'));
            }
        );
    }
}
