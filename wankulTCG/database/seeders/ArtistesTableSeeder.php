<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtistesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artistes = [
            ['artiste_name' => 'Scott Cawthon', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'MatPat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Michael Crichton', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Farfa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Seb du grenier', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('artistes')->insert($artistes);
    }
}
