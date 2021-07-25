<?php

namespace Bfg\Request;

use Bfg\Installer\Providers\InstalledProvider;
use Bfg\Request\Commands\RequestMakeCommand;

/**
 * Class ServiceProvider
 * @package Bfg\Request
 */
class ServiceProvider extends InstalledProvider
{
    /**
     * The description of extension.
     * @var string|null
     */
    public ?string $description = "A slight addition to the Laravel Request";

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

