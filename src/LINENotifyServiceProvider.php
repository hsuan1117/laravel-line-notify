<?php

namespace NotificationChannels\LINENotify;

use Illuminate\Support\ServiceProvider;

class LINENotifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Bootstrap code here.
        $this->publishes([
            __DIR__.'/config/line-notify.php' => config_path('line-notify.php'),
        ], 'line-notify-config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
