<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EmailHelper extends Controller
{
    public static function send(User $user, $subject, $body, $isButton = true, $buttonText, $buttonUrl)
    {
        try {
            Mail::to($user->email)->queue(new NotificationMail($subject, $body, $user, $isButton, $buttonText, $buttonUrl));
        } catch (Throwable $th) {
            Log::info($th);
        }
    }
}
