<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ResturentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resturents')->insert([[
            'name' => 'resturant-1',
            'lat' => '23.819702701512924',
            'long' => '90.37147637553448',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'resturant-2',
            'lat' => '23.8177074584322',
            'long' => '90.36808803044907',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
