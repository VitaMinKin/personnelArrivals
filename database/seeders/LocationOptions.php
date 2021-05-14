<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationOptions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawData = file_exists(__DIR__ . "/../../app/src/fixtures/locations.txt") ? file_get_contents(__DIR__ . "/../../app/src/fixtures/locations.txt") : false;

        if (!$rawData) {
            return false;
        }

        $locations = explode("\n", trim($rawData));

        array_map(function ($location) {
            DB::table('location_options_list')->insert([
                'location' => trim($location)
            ]);
        }, $locations);
    }
}
