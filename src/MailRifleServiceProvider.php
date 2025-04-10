<?php

namespace Nagi\MailRifle;

use Illuminate\Support\ServiceProvider;
use Nagi\MailRifle\Commands\MailRifleCommand;

class MailRifleServiceProvider extends ServiceProvider
{
   public function boot()
   {
        config(
            'mail.mailers.mailrifle' => [
                'transport' => 'mailrifle',
            ]
        );

        app(MailRifle::class)->extend('mailrifle', function ($app) {
            return new MailRifleTransport();
        });
   }
}
