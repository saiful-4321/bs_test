<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RiderInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riders_info')->insert([
                [
                'rider_id' => 1,
                'lat' => '23.819702701512924',
                'long' => '90.37147637553448',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'rider_id' => 1,
                'lat' => '23.8177074584322',
                'long' => '90.36808803044907',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
