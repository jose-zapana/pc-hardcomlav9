<?php

namespace App\Events;

use App\Cart;
use App\Customer;
use App\Sale;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sale;
    public $cart;
    public $customer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Sale $sale, Cart $cart, Customer $customer)
    {
        $this->sale = $sale;
        $this->cart = $cart;
        $this->customer = $customer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
