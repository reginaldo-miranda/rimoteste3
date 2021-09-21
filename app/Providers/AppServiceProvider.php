<?php

namespace App\Providers;
namespace App\Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving('db', function ($db) {
            /** @var DatabaseManager $db */
            $db->extend('odbc', function ($config, $name) {
                $pdoConnection = (new ODBCConnector())->connect($config);
                $connection = new ODBCConnection($pdoConnection, $config['database'], isset($config['prefix']) ? $config['prefix'] : '', $config);
                return $connection;
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::setConnectionResolver($this->app['db']);
        Model::setEventDispatcher($this->app['events']);
    }
}
