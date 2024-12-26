<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $product;
    public $jumlahSebelum;
    public $jumlahSesudah;

    /**
     * Create a new event instance.
     */
    public function __construct($product, $jumlahSebelum, $jumlahSesudah)
    {
        $this->product = $product;
        $this->jumlahSebelum = $jumlahSebelum;
        $this->jumlahSesudah = $jumlahSesudah;
    }


}
