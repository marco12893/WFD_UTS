<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'flight_code' => "JAN24",
                'origin' => 'SBY',
                'destination' => "JKT",
                'departure_time' => "2025-04-03 16:15:00",
                'arrival_time' => "2025-04-03 17:15:00"
            ],
            [
                'flight_code' => "BIW78",
                'origin' => 'CKG',
                'destination' => "WBI",
                'departure_time' => "2025-03-03 14:15:00",
                'arrival_time' => "2025-03-03 16:15:00"
            ],
            [
                'flight_code' => "NGO92",
                'origin' => 'GNL',
                'destination' => "GAN",
                'departure_time' => "2025-04-04 16:00:00",
                'arrival_time' => "2025-04-04 17:45:00"
            ],
            [
                'flight_code' => "NGO12",
                'origin' => 'FBI',
                'destination' => "GOQ",
                'departure_time' => "2025-03-02 11:15:00",
                'arrival_time' => "2025-03-21 13:15:00"
            ],
            [
                'flight_code' => "JWN43",
                'origin' => 'NSQ',
                'destination' => "GNJ",
                'departure_time' => "2025-03-12 09:15:00",
                'arrival_time' => "2025-03-13 11:15:00"
            ]
        ]);
    }
}
