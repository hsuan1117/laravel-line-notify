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
            __DIR__.'/../config/line-notify.php' => config_path('line-notify.php'),
        ], 'line-notify-config');

        /**
         * Here's some example code we use for the pusher package.

        $this->app->when(Channel::class)
            ->needs(Pusher::class)
            ->give(function () {
                $pusherConfig = config('broadcasting.connections.pusher');

                return new Pusher(
                    $pusherConfig['key'],
                    $pusherConfig['secret'],
                    $pusherConfig['app_id']
                );
            });
         */

    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
