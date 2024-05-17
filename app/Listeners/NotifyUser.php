<?php

namespace App\Listeners;


use App\Models\User;
use App\Mail\UserMail;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
         $users = User::get();

         foreach ($users as $user)
         {
            Mail::to($user->email)->send(new UserMail($event->post));
         }
    }
}
