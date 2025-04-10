<?php

namespace Nagi\MailRifle\Commands;

use Illuminate\Console\Command;
use Nagi\MailRifle\MailRifle;

class ClearMailRifleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailrifle:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all emails stored by Mailrifle in the database.';

    /**
     * Execute the console command. Attempt to delete
     * all of the Mailbase items stored in the DB.
     * If an exception is thrown, catch it and
     * display it in the console.
     *
     * @return void
     */
    public function handle()
    {
        $this->line('Clearing stored Mailrifle emails.');

        MailRifle::truncate();

        $this->info('Cleared stored Mailrifle emails.');
    }
}
