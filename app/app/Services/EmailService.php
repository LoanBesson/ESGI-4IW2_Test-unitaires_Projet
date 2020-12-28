<?php

namespace App\Services;

use App\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public static function send()
    {
        $user = User::find(Auth::user()->getAuthIdentifier());

        if (time() >= strtotime('+18 years', strtotime($user->birthday)))
        {
            // Envoi du mail
            // Mail::to(Auth::user()->email)->send();
            return true;
        } else {
            return false;
        }
    }
}
