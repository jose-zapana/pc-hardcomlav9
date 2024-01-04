<?php

namespace App\Listeners;

use App\Events\OrderConfirmed;
use App\Mail\CheckoutMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailOrderConfirmed
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
     * @param  OrderConfirmed  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
        Mail::to('joryes1894@gmail.com')->send( new CheckoutMail($event->sale, $event->cart, $event->customer) );
        logger('Email enviado ...');
    }
}
