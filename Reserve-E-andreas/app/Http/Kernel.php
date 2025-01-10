<?php

namespace App\Http;

use App\Http\Middleware\CheckLoggedIn;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     */
    protected $middleware = [
        // Add global middleware here
    ];

    /**
     * The application's route middleware groups.
     */
    protected $middlewareGroups = [
        'web' => [
            // Default web middleware
        ],

        'api' => [
            // Default API middleware
        ],
    ];

    /**
     * The application's route middleware.
     */
    protected $routeMiddleware = [
        // Other middleware
        'checkLoggedIn' => CheckLoggedIn::class,
    ];

}
