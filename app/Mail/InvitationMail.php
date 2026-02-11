<?php

namespace App\Mail;

use App\Models\User;

class InvitationMail
{
    public static function html(User $user, $inviteLink)
    {
        return view('emails.invitation', [
            'user'       => $user,
            'inviteLink' => $inviteLink
        ])->render();
    }
}
