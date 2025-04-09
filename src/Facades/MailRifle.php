<?php

namespace Nagi\MailRifle\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nagi\MailRifle\MailRifle
 */
class MailRifle extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Nagi\MailRifle\MailRifle::class;
    }
}
