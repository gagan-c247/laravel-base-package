<?php

namespace c247\codebank\Commands;

use c247\codebank\Providers\RouteServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCodebank extends Command
{
    protected $signature = "codebank:install";
    protected $description = "Install CodeBank";

    public function handle()
    {
        Artisan::call("vendor:publish", ["--provider" => "Spatie\Permission\PermissionServiceProvider"]);
        $this->info("Publishing routes....");
        $this->publishRoutes();
        $this->info("Publishing migrations....");
        $this->publishMigrations();
        $this->info("Publishing services....");
        $this->publishServices();
        $this->info("Publishing controllers....");
        $this->publishControllers();
        $this->info("Publishing models....");
        $this->publishModels();
        $this->info("Publishing views....");
        $this->publishView();
        $this->info("Publishing traits....");
        $this->publishTraits();
        $this->info('Publish Middlewares....');
        $this->publishMiddlewares();
        $this->info('Publish Requests....');
        $this->publishRequests();
        $this->info('Publish Components....');
        $this->publishComponents();
        $this->info('Publishing seeders....');
        $this->publishSeeders();
    }
    private function publishRoutes()
    {
        Artisan::call("vendor:publish", ["--tag" => "codebank-routes"]);
        $this->info("Routes published");
        // app()->register(RouteServiceProvider::class);
    }

    private function publishMigrations()
    {
        Artisan::call("vendor:publish", ["--tag" => 'codebank-migrations']);
        $this->info('Migrations published');
    }
    private function publishServices()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-services']);
        $this->info('Services published');
    }
    private function publishControllers()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-controllers']);
        $this->info('Controllers published');
    }
    private function publishModels()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-models']);
        $this->info('Models published');
    }
    private function publishView()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-views']);
        $this->info('Views published');
    }
    private function publishTraits()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-traits']);
        $this->info('Traits published');
    }
    private function publishMiddlewares()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-middlewares']);
        $this->info('Middlewares published');
    }
    private function publishRequests()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-requests']);
        $this->info('Requests published');
    }
    private function publishComponents()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-components']);
        $this->info('Components published');
    }
    private function publishSeeders()
    {
        Artisan::call('vendor:publish', ['--tag' => 'codebank-seeders']);
        $this->info('Seeders published');
    }
}
