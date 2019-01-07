<?php

namespace Touge\LocalFileBrowser;

use Illuminate\Support\ServiceProvider;

/**
 * Class LocalFileBrowserServiceProvider
 * @package Touge\LocalFileBrowser
 */
class LocalFileBrowserServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(LocalFileBrowser $extension)
    {
        if (! LocalFileBrowser::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'localFileBrowser');
        }

//        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
//            $this->publishes(
//                [$assets => public_path('vendor/laravel-admin-ext/localFileBrowser')],
//                'localFileBrowser'
//            );
//        }

//        $this->app->booted(function () {
//            LocalFileBrowser::routes(__DIR__.'/../routes/web.php');
//        });
    }
}