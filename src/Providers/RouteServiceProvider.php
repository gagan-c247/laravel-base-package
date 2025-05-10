<?php

namespace c247\codebank\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Use the register method for service bindings, if any.
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutes('admin/api/auth.php');
        $this->loadRoutes('admin/web/auth.php');
        $this->loadRoutes('admin/api/user.php');
        $this->loadRoutes('admin/web/user.php');
        $this->loadRoutes('admin/api/category.php');
        $this->loadRoutes('admin/web/category.php');
        $this->loadRoutes('admin/api/blog.php');
        $this->loadRoutes('admin/api/common.php');
        $this->loadRoutes('admin/web/blog.php');
        $this->loadRoutes('admin/web/common.php');
        $this->loadRoutes('admin/api/cms.php');
        $this->loadRoutes('admin/web/cms.php');
        $this->loadRoutes('admin/api/coupon.php');
        $this->loadRoutes('admin/web/coupon.php');
        $this->loadRoutes('admin/api/email.php');
        $this->loadRoutes('admin/web/email.php');
    }

    /**
     * Load route file if it exists.
     */
    protected function loadRoutes(string $file): void
    {
        $path = base_path('routes/' . $file);

        if (file_exists($path)) {
            $middleware = strpos($file, 'api') === false ? 'web' : 'api';
            Route::middleware($middleware)->group($path);
        }
    }
}
