<?php

namespace App\Providers;

use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\Eloquent\CustomerEloquentRepository;
use App\Http\Services\CustomerServiceInterface;
use App\Http\Services\Implement\CustomerService;
use App\Http\Services\ServiceInterface;
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
        $this->app->singleton(CustomerServiceInterface::class,CustomerService::class);
        $this->app->singleton(CustomerRepositoryInterface::class,CustomerEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
