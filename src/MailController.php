<?php

namespace Nagi\MailRifle;

use Illuminate\Routing\Controller;

class MailController extends Controller
{
    public function index()
    {
        $mails = MailRifle::query()->latest('sent_at')->paginate(20);

        return view('mailrifle::index', ['mails' => $mails]);
    }

    public function show(MailRifle $mailrifle)
    {
        $mailrifle->update(['is_read' => 1]);

        return response()->json($mailrifle);
    }
}
