<?php

namespace Bfg\Request;

use Bfg\Installer\Providers\InstalledProvider;
use Bfg\Request\Commands\RequestMakeCommand;

/**
 * Class ServiceProvider.
 * @package Bfg\Request
 */
class ServiceProvider extends InstalledProvider
{
    /**
     * Set as installed by default.
     * @var bool
     */
    public bool $installed = true;

    /**
     * Executed when the provider is registered
     * and the extension is installed.
     * @return void
     */
    public function installed(): void
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
     * Executed when the provider run method
     * "boot" and the extension is installed.
     * @return void
     */
    public function run(): void
    {
        //
    }
}
