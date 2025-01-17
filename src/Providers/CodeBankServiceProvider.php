<?php

namespace c247\codebank\Providers;

use c247\codebank\Commands\InstallCodebank;
use c247\codebank\Middleware\CheckUserActive;
use Illuminate\Support\ServiceProvider;

class CodeBankServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->commands([
            InstallCodebank::class,
        ]);

        $this->publishes([
            __DIR__ . '/../stubs/routes' => base_path('routes')
        ], 'codebank-routes');
        $this->publishes([
            __DIR__ . '/../stubs/requests' => base_path('app/Http/Requests')
        ], 'codebank-requests');
        $this->publishes([
            __DIR__ . '/../stubs/migrations' => base_path('database/migrations')
        ], 'codebank-migrations');

        $this->publishes([__DIR__ . '/../stubs/controllers' => base_path('app/Http/Controllers')], 'codebank-controllers');
        $this->publishes([__DIR__ . '/../stubs/services' => base_path('app/Services')], 'codebank-services');
        $this->publishes([__DIR__ . '/../stubs/models' => base_path('app/Models')], 'codebank-models');
        $this->publishes([__DIR__ . '/../stubs/Traits' => base_path('app/Traits')], 'codebank-traits');
        $this->publishes([__DIR__ . '/../stubs/resources/views/admin' => base_path('resources/views/admin'), __DIR__ . '/../stubs/resources/lang' => base_path('resources/lang'), __DIR__ . '/../stubs/resources/admin' => base_path('resources/admin'), __DIR__ . '/../stubs/resources/public/admin' => base_path('public/admin')], 'codebank-views');
        $this->publishes([__DIR__ . '/../stubs/Middleware' => base_path('app/Http/Middleware')], 'codebank-middlewares');
        $this->publishes([__DIR__ . '/../stubs/components' => base_path('app/View/Components')], 'codebank-components');
        $this->publishes([__DIR__ . '/../stubs/seeders' => base_path('database/seeders')], 'codebank-seeders');

        // $this->publishes([__DIR__ . '/../stubs/services' => base_path('app/Services')], 'codebank-services');
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
