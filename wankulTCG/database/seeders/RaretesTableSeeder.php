<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RaretesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raretes = [
            ['rarete_name' => 'commune', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['rarete_name' => 'rare', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['rarete_name' => 'super rare', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['rarete_name' => 'ultra rare', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['rarete_name' => 'secret rare', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('raretes')->insert($raretes);
    }
}
