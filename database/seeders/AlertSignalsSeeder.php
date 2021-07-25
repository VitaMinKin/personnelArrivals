<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertSignalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawData = file_exists(__DIR__ . "/../../app/src/fixtures/AlertSignals.txt") ? file_get_contents(__DIR__ . "/../../app/src/fixtures/AlertSignals.txt") : false;

        if (!$rawData) {
            return false;
        }

        $signalsList = explode("\n", trim($rawData));

        array_map(function ($row) {
            $signal = explode(" - ", trim($row));
            return DB::table('alert_signals')->insert([
                'caption' => trim($signal[0]),
                'code' => trim($signal[1])
            ]);
        }, $signalsList);
    }
}
