<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserRegistered $event)
    {
        $adminEmail = 'datdmgcc210147@fpt.edu.vn'; // Thay đổi thành email của leader/admin
        $user = $event->user;

        Mail::send('emails.user_account_notif', ['user' => $user], function ($message) use ($adminEmail) {
            $message->to($adminEmail)
                ->subject('New User Registration');
        });
    }
}
