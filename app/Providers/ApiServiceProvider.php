<?php

namespace App\Providers;

use App\Services\Api\Smoke\SmokeService;
use App\Services\Api\Smoke\SmokeServiceInterface;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $services = [
            [
                'repository' => SmokeService::class,
                'interface'  => SmokeServiceInterface::class
            ],
        ];

        foreach ($services as $service) {
            $this->app->bind($service['interface'], $service['repository']);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Success (2xx)
        Response::macro('success', function ($status, $message = null) {
            return response()->json([
                'status'  => $status,
                'message' => $message,
            ], $status);
        });

        // Error (4xx, 5xx)
        Response::macro('error', function ($status, $message) {
            return response()->json([
                'status'  => $status,
                'message' => $message,
            ], $status);
        });
    }
}
