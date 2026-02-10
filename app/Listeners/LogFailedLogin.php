<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use App\Models\LoginAttempt;
use Illuminate\Http\Request;

class LogFailedLogin
{
    public function handle(Failed $event)
    {
        LoginAttempt::create([
            'email' => request('email'),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'reason' => $this->reason(),
        ]);
    }

    protected function reason(): string
    {
        if (! request('password')) {
            return 'password_missing';
        }

        return 'invalid_credentials';
    }
}
