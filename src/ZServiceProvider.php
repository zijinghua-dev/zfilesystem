<?php


namespace Zijinghua\Zfilesystem;

use Illuminate\Support\ServiceProvider;
use Zijinghua\Zfilesystem\Providers\RouteServiceProvider;
use Zijinghua\Zfilesystem\Providers\ZAliOssServiceProvider;
use Zijinghua\Zfilesystem\Providers\ZEventServiceProvider;

class ZServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->registerConsoleCommands();
            $this->registerPublishableResources();
        }
        $this->registerProvider();
    }

    public function boot()
    {
        $this->mergeConfig();
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(realpath(__DIR__ . '/../publishable/migrations'));
        }
    }

    private function registerProvider(){
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ZEventServiceProvider::class);
        $this->app->register(ZAliOssServiceProvider::class);
    }

    public function registerConsoleCommands()
    {
        $this->commands(Commands\Install::class);
    }

    protected function registerPublishableResources()
    {
        //
    }

    protected function getPublishablePath()
    {
        return realpath(__DIR__.'/../publishable');
    }

    protected function mergeConfig()
    {
        $this->mergeConfigFrom( $this->getPublishablePath(). '/configs/file.php', 'zfilesystem.file');
        $this->mergeConfigFrom( $this->getPublishablePath(). '/configs/zoss.php', 'zfilesystem.zoss');
        $this->mergeConfigFrom( $this->getPublishablePath(). '/configs/code/file.php', 'zbasement.code.file');
        $this->mergeConfigFrom( $this->getPublishablePath(). '/configs/validation/rules/file.php', 'zbasement.validation.rules.file');
        $this->mergeConfigFrom( $this->getPublishablePath(). '/configs/validation/messages/file.php', 'zbasement.validation.messages.file');
    }
}

