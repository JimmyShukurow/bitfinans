<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'plate_number' => 34 . ' ' . strtoupper(Str::random(3)) . ' ' . rand(100, 999),
            'lat' => (float) env('DEFAULT_LAT'),
            'lng' => (float) env('DEFAULT_LNG'),
        ];
    }
}
