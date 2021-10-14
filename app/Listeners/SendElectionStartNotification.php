<?php

namespace App\Listeners;

use App\Events\StartElection;
use App\Mail\ElectionStartedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendElectionStartNotification
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
     * @param  StartElection  $event
     * @return void
     */
    public function handle(StartElection $event)
    {
        Mail::to('richardmwilson191@gmail.com')->send(new ElectionStartedEmail($event->voter));
    }
}
