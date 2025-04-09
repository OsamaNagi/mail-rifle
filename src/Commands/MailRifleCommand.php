<?php

namespace Nagi\MailRifle\Commands;

use Illuminate\Console\Command;

class MailRifleCommand extends Command
{
    public $signature = 'mail-rifle';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
