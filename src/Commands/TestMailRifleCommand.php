<?php

namespace Nagi\Mailbase\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\MailManager;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TestMailRifleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailrifle:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email through mailrifle to test if it works.';

    /**
     * @return void
     */
    public function handle()
    {
        /**
         * @var MailManager|null $mailer
         */
        $mailer = app(MailManager::class);

        if (! $mailer instanceof MailManager || $mailer->getDefaultDriver() !== 'mailrifle') {
            $this->output->error("Mailrifle may not be set as your mail driver.\nPlease don't forget to set mailrifle as MAIL_MAILER in your env file.");

            return;
        }

        Mail::mailer('mailrifle')->raw('Hello from Mailrifle', function (Message $msg) {

            $appName = config('app.name');
            $to = 'admin@'.Str::slug($appName).'.local';
            $msg->to($to, 'Admin')
                ->subject('Test Email')
                ->text("Hi, welcome to $appName!");

            $this->output->success('Mail is sent! Please view it at /mailrifle');
        });
    }
}
