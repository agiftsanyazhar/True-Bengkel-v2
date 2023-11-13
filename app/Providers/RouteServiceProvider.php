<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    File,
    RateLimiter,
    Route,
};

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api/admin.php'));

            $apiRoutePath = base_path('routes/api');
            $apiRouteFiles = File::files($apiRoutePath);

            foreach ($apiRouteFiles as $routeFile) {
                $filename = $routeFile->getFilename();
                if ($filename !== 'api.php') {
                    Route::middleware('api')
                        ->prefix('api')
                        ->group($apiRoutePath . '/' . $filename);
                }
            }

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
