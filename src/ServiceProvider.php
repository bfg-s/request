<?php

namespace Bfg\Request;

use Bfg\Request\Commands\RequestMakeCommand;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * Class ServiceProvider.
 * @package Bfg\Request
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register route settings.
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->app->extend('command.request.make', function () {
                return new RequestMakeCommand(app('files'));
            });
            $this->app->extend(\Illuminate\Foundation\Console\RequestMakeCommand::class, function () {
                return new RequestMakeCommand(app('files'));
            });
        }
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot()
    {
        //
    }
}
