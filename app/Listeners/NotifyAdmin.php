<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMail;
use App\Events\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdmin
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
    
        Mail::to('admin@gmail.com')->send(new AdminMail($event->post));


    }
}
