<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lines')->insert([
            [
                'id'    => '1',
                'name'  => 'Line 1',
                'color' => 'green',
            ],
            [
                'id'    => '2',
                'name'  => 'Line 2',
                'color' => 'orange',
            ],
        ]);
        DB::table('stations')->insert([
            [
                'id'         => '1',
                'name'       => 'A1',
                'coordinate' => '1,1',
            ],
            [
                'id'         => '2',
                'name'       => 'A2',
                'coordinate' => '2,1',
            ],
            [
                'id'         => '3',
                'name'       => 'A3',
                'coordinate' => '3,2',
            ],
            [
                'id'         => '4',
                'name'       => 'A4',
                'coordinate' => '4,4',
            ],
            [
                'id'         => '5',
                'name'       => 'A5',
                'coordinate' => '4,5',
            ],
            [
                'id'         => '6',
                'name'       => 'B1',
                'coordinate' => '1,5',
            ],
            [
                'id'         => '7',
                'name'       => 'B2',
                'coordinate' => '2,3',
            ],
            [
                'id'         => '8',
                'name'       => 'B3',
                'coordinate' => '3,3',
            ],
            [
                'id'         => '9',
                'name'       => 'B4',
                'coordinate' => '5,5',
            ],
        ]);
        DB::table('line_station')->insert([
            [
                'id'         => '1',
                'line_id'    => '1',
                'station_id' => '1',
                'station_no' => '1',
            ],
            [
                'id'         => '2',
                'line_id'    => '1',
                'station_id' => '2',
                'station_no' => '2',
            ],
            [
                'id'         => '3',
                'line_id'    => '1',
                'station_id' => '3',
                'station_no' => '3',
            ],
            [
                'id'         => '4',
                'line_id'    => '1',
                'station_id' => '4',
                'station_no' => '4',
            ],
            [
                'id'         => '5',
                'line_id'    => '1',
                'station_id' => '5',
                'station_no' => '5',
            ],
            [
                'id'         => '6',
                'line_id'    => '2',
                'station_id' => '7',
                'station_no' => '2',
            ],
            [
                'id'         => '7',
                'line_id'    => '2',
                'station_id' => '6',
                'station_no' => '1',
            ],
            [
                'id'         => '8',
                'line_id'    => '2',
                'station_id' => '8',
                'station_no' => '3',
            ],
            [
                'id'         => '9',
                'line_id'    => '2',
                'station_id' => '4',
                'station_no' => '4',
            ],
            [
                'id'         => '10',
                'line_id'    => '2',
                'station_id' => '5',
                'station_no' => '5',
            ],
            [
                'id'         => '11',
                'line_id'    => '2',
                'station_id' => '9',
                'station_no' => '6',
            ],
        ]);
    }
}
