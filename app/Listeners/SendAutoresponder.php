<?php

namespace App\Listeners;
use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class SendAutoresponder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    
    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;

        Mail::send('email.contact',['msg' => $message],function($m) use ($message){

            $m->to($message->email, $message->nombre)->subject('Tu Mensaje fue Recibido');
        });

    }
}
