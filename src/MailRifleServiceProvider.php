<?php

namespace Nagi\MailRifle;

use Nagi\MailRifle\Commands\MailRifleCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
