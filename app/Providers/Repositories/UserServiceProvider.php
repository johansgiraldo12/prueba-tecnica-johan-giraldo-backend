<?php

namespace App\Providers\Repositories;

use App\Http\Repositories\User\Main\UserRepository;
use App\Http\Repositories\User\Main\UserRepositoryInterface;
use App\Http\Repositories\User\UserCategory\UserCategoryRepository;
use App\Http\Repositories\User\UserCategory\UserCategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    protected $repositories = [
        UserRepositoryInterface::class => UserRepository::class,
        UserCategoryRepositoryInterface::class => UserCategoryRepository::class
    ];

    public function register()
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
