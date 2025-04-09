<?php

namespace Nagi\MailRifle;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Nagi\MailRifle\Commands\MailRifleCommand;

class MailRifleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('mail-rifle')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_mail_rifle_table')
            ->hasCommand(MailRifleCommand::class);
    }
}
