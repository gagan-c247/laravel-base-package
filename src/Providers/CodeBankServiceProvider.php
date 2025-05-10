<?php

namespace c247\codebank\Providers;

use C247\Codebank\Commands\InstallCodebank;
use C247\Codebank\Middleware\CheckUserActive;
use Illuminate\Support\ServiceProvider;

class CodeBankServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->commands([
            InstallCodebank::class,
        ]);
        // publishing routes
        $this->publishes([
            __DIR__ . '/../Stubs/routes' => base_path('routes')
        ], 'codebank-routes');
        //publising requests
        $this->publishes([
            __DIR__ . '/../Stubs/requests' => base_path('app/Http/Requests')
        ], 'codebank-requests');
        // publishing migrations
        $this->publishes([
            __DIR__ . '/../Stubs/migrations' => base_path('database/migrations')
        ], 'codebank-migrations');
        // publishing controllers
        $this->publishes([__DIR__ . '/../Stubs/controllers' => base_path('app/Http/Controllers/Admin')], 'codebank-controllers');
        //publishing services
        $this->publishes([__DIR__ . '/../Stubs/services' => base_path('app/Services/Admin')], 'codebank-services');
        // publishing models
        $this->publishes([__DIR__ . '/../Stubs/models' => base_path('app/Models')], 'codebank-models');
        // publishing views and assets and langs
        $this->publishes([__DIR__ . '/../Stubs/resources/views/' => base_path('resources/views/admin'), __DIR__ . '/../Stubs/resources/lang' => base_path('resources/lang'), __DIR__ . '/../Stubs/resources/assets' => base_path('public/admin')], 'codebank-views');
    }
    public function boot()
    {
        $router = $this->app->router; // Get the router instance
        $router->aliasMiddleware('role', \Spatie\Permission\Middleware\RoleMiddleware::class);
        $router->aliasMiddleware('permission', \Spatie\Permission\Middleware\PermissionMiddleware::class);
        $router->aliasMiddleware('role_or_permission', \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class);
        $router->aliasMiddleware('user.active', CheckUserActive::class);
    }
}
