<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CoordinatesUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Plate of a vehicle
     *
     * @var string $plate
     */
    public $plate;

    /**
     * Latitude of a vehicle
     *
     * @var float $lat
     */
    public $lat;
    
    /**
     * Longitude of a vehicle
     *
     * @var float $lng
     */
    public $lng;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $plate, float $lat, float $lng)
    {
        $this->plate = $plate;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * Make event name short
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastAs()
    {
        return 'coordinates.updated';
    }

    /**
     * Channel used to broadcast event
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('vehicle-coordinates');
    }
}
