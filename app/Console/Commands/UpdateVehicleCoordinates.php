<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Cache;
use App\Events\CoordinatesUpdated;

class UpdateVehicleCoordinates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:vehicle-coordinates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates vehicle coordinates and broadcast event';

    /**
     * Updates coordinates and broadcasts an event
     *
     * @return void
     */
    public function handle(): void
    {
        $vehicle = Vehicle::first();
        $vehicle->lat += 0.01;
        $vehicle->lng += 0.01;
        $vehicle->save();

        Cache::put('vehicle', $vehicle);
        
        broadcast(new CoordinatesUpdated($vehicle->plate_number, $vehicle->lat, $vehicle->lng));
    }
}
