<?php

namespace App\Providers;

use App\Repository\Category\CategoryInterfaceRepository;
use App\Repository\Category\CategoryRepository;
use App\Repository\Role\RoleInterfaceRepository;
use App\Repository\Role\RoleRepository;
use App\Repository\SubCategory\SubCategoryInterfaceRepository;
use App\Repository\SubCategory\SubCategoryRepository;
use App\Repository\User\UserInterfaceRepository;
use App\Repository\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(UserInterfaceRepository::class,UserRepository::class);
        $this->app->bind(RoleInterfaceRepository::class,RoleRepository::class);
        $this->app->bind(CategoryInterfaceRepository::class,CategoryRepository::class);
        $this->app->bind(SubCategoryInterfaceRepository::class,SubCategoryRepository::class);
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