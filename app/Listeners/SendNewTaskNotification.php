<?php

namespace App\Listeners;

use App\Events\NewTaskAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewTaskNotification;

class SendNewTaskNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewTaskAdded  $event
     * @return void
     */
    public function handle(NewTaskAdded $event)
    {

        Mail::to('fake@mail.com')->send(new NewTaskNotification($event->task, $event->user));
    }
}
