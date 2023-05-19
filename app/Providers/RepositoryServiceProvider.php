<?php

namespace App\Providers;

use App\Repositories\Api\Brand\BrandRepository;
use App\Repositories\Api\Brand\BrandRepositoryInterface;
use App\Repositories\Api\Smoke\SmokeRepository;
use App\Repositories\Api\Smoke\SmokeRepositoryInterface;
use App\Repositories\Api\User\UserRepository;
use App\Repositories\Api\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $repositories = [
            [
                'repository' => BrandRepository::class,
                'interface'  => BrandRepositoryInterface::class
            ],
            [
                'repository' => SmokeRepository::class,
                'interface'  => SmokeRepositoryInterface::class
            ],
            [
                'repository' => UserRepository::class,
                'interface'  => UserRepositoryInterface::class
            ],
        ];

        foreach ($repositories as $repo) {
            $this->app->bind($repo['interface'], $repo['repository']);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
