<?php

namespace Nagi\MailRifle;

use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;

class MailRifleTransport extends AbstractTransport
{
    protected function doSend(SentMessage $message): void
    {
        $email = $message->getOriginalMessage();

        if (! $email instanceof \Symfony\Component\Mime\Email) {
            throw new \InvalidArgumentException('The original message must be an instance of Symfony\Component\Mime\Email.');
        }

        $subject = $email->getSubject();
        $from = collect($email->getFrom())->map->toString()->implode("\n");
        $to = collect($email->getTo())->map->toString()->implode("\n");
        $cc = collect($email->getCc())->map->toString()->implode("\n");
        $bcc = collect($email->getBcc())->map->toString()->implode("\n");
        $body = $email->getHtmlBody() ?: $email->getTextBody();
        $attachments = collect($email->getAttachments())->toJson();
        $headers = $email->getHeaders()->toString();

        MailRifle::create([
            'from' => $from,
            'to' => $to,
            'cc' => $cc,
            'bcc' => $bcc,
            'subject' => $subject,
            'body' => $body,
            'headers' => $headers,
            'attachments' => $attachments,
            'sent_at' => now()->toDateTimeString(),
        ]);

    }

    public function __toString(): string
    {
        return 'mailrifle';
    }
}
