<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    ProductRepositoryInterface,
    CategoryRepositoryInterface,
    NcmRepositoryInterface,
    BrandRepositoryInterface,
    AddressRepositoryInterface,
    CitytRepositoryInterface,
    StatetRepositoryInterface,
    CfopRepositoryInterface,
    FomaPgtoRepositoryInterface,
    ProviderRepositoryInterface,
    SaleRepositoryInterface,
    BudgetRepositoryInterface,
    ClientRepositoryInterface,
    PurChaseRepositoryInterface,
    ChartRepositoryInterface
};

use App\Repositories\Core\Eloquent\{
    EloquentProductRepository,
    EloquentCategoryRepository,
    EloquentNcmRepository,
    EloquentBrandRepository,
    EloquentAddressRepository,
    EloquentCityRepository,
    EloquentStateRepository,
    EloquentCfopRepository,
    EloquentFomaPgtoRepository,
    EloquentProviderRepository,
    EloquentSaleRepository,
    EloquentBudgetRepository,
    EloquentClientRepository,
    EloquentPurChaseRepository,
    EloquentChartRepository
};

use App\Repositories\Core\QueryBuilder\{
    QueryBuilderCategoryRepository,
    QueryBuilderNcmRepository,
    QueryBuilderBrandRepository,
    QueryBuilderAddressRepository,
    QueryBuilderCityRepository,
    QueryBuilderStateRepository,
    QueryBuilderCfopRepository,
    QueryBuilderFomaPgtoRepository,
    QueryBuilderProviderRepository,
    QueryBuilderSaleRepository,
    QueryBuilderBudgetRepository,
    QueryBuilderClientRepository,
    QueryBuilderPurchaseRepository,
    QueryBuilderChartRepository,
    QueryBuilderReportsRepository
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class        
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            //QueryBuilderCategoryRepository::class
            EloquentCategoryRepository::class
        );

        $this->app->bind(//grafico
            ChartRepositoryInterface::class,
            EloquentChartRepository::class
        );

        $this->app->bind(//marca ou fabricante
            BrandRepositoryInterface::class,
            //QueryBuilderBrandRepository::class
            EloquentBrandRepository::class
        );

        $this->app->bind(
            NcmRepositoryInterface::class,
            //QueryBuilderNcmRepository::class
            EloquentNcmRepository::class
        );

        $this->app->bind(//cidade
            CityRepositoryInterface::class,
            QueryBuilderCityRepository::class
            //EloquentCityRepository::class
        );

        $this->app->bind(//Estado
            StateRepositoryInterface::class,
            QueryBuilderStateRepository::class
            //EloquentStateRepository::class
        );

        $this->app->bind(//Endereço
            AddressRepositoryInterface::class,
            EloquentAddressRepository::class
            //QueryBuilderAddressRepository::class
        );

        $this->app->bind(
            CfopRepositoryInterface::class,
            QueryBuilderCfopRepository::class
            //EloquentCfopRepository::class
        );

        $this->app->bind(//forma de pagamento
            FomaPgtoRepositoryInterface::class,
            QueryBuilderFomaPgtoRepository::class
            //EloquentFomaPgtoRepository::class
        );

        $this->app->bind(//fornecedor
            ProviderRePositoryInterface::class,
            //QueryBuilderProviderRepository::class
            EloquentProviderRepository::class
        );

        $this->app->bind(//venda
            SaleRepositoryInterface::class,
            //QueryBuilderSaleRepository::class
            EloquentSaleRepository::class
        );

        $this->app->bind(//orçamento
            BudgetRepositoryInterface::class,
            //QueryBuilderBudgetRepository::class
            EloquentBudgetRepository::class
        );

        $this->app->bind(//cliente
            ClientRepositoryInterface::class,
            //QueryBuilderClientRepository::class
            EloquentClientRepository::class
        );

        $this->app->bind(//compra
            PurChaseRepositoryInterface::class,
            //QueryBuilderPurChaseRepository::class
            EloquentPurChaseRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
