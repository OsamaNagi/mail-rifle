<?php

namespace Nagi\MailRifle;

use Illuminate\Database\Eloquent\Model;

class MailRifle extends Model
{
    protected $table = 'mail_rifle';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'sent_at' => 'datetime',
    ];
}
