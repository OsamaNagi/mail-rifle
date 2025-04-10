<?php

namespace Nagi\MailRifle;

use Illuminate\Support\ServiceProvider;
use Nagi\Mailbase\Commands\TestMailRifleCommand;
use Nagi\MailRifle\Commands\ClearMailRifleCommand;

class MailRifleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        config([
            'mail.mailers.mailrifle' => [
                'transport' => 'mailrifle',
            ],
        ]);

        app(MailRifle::class)->extend('mailrifle', function ($app) {
            return new MailRifleTransport;
        });

        $this->loadMigrationsFrom(__DIR__.'/migrations/');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'mailbase');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ClearMailRifleCommand::class,
                TestMailRifleCommand::class,
            ]);
        }
    }
}
