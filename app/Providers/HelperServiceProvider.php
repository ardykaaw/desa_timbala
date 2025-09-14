<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register AssetHelper as a global helper
        if (!function_exists('asset_helper')) {
            function asset_helper($path, $type = 'js') {
                if (app()->environment('local')) {
                    return asset($path);
                }
                return url($path);
            }
        }

        // Register Blade directive
        Blade::directive('assethelper', function ($expression) {
            return "<?php echo asset_helper($expression); ?>";
        });
    }
}
