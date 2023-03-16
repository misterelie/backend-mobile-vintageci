<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent as MetaAgent;
class AgentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/Agent.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
    */
    public function boot()
    {
        //
    }
}
