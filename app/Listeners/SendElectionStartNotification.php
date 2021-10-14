<?php

namespace App\Listeners;

use App\Events\StartElection;
use App\Http\Controllers\TwilioController;
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
        $code = $event->voter->v_code;
        $smsMessage = "Click the link to start voting " . config('app.url') . '/voter/login' . " Your authentication code is 
        $code
        Use the code along with you log in credentials sent to your email to verify your identity";
        $twilio = new TwilioController();
        $twilio->sendSMS($event->voter->phone_num, $smsMessage);

        Mail::to('richardmwilson191@gmail.com')->send(new ElectionStartedEmail($event->voter));
    }
}
