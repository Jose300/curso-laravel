<?php

namespace App\Listeners;
use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationToTheOwner
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

        Mail::send('email.responder',['msg' => $message],function($m) use ($message){

            $m->from($message->email, $message->nombre)
            ->to('jose.perera74@gmail.com', 'Jose')
            ->subject('Tu Mensaje fue Recibido');
        });
    }
}
