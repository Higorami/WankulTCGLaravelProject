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
            // 5
            ['artiste_name' => 'KaroArt', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Yuriiick', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Jaycee', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Ben Gilletti', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Léonard Lam', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // 10
            ['artiste_name' => 'Lhotus', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Franck Sabatier', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Maël Lohbrunner', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Camille Soulier', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['artiste_name' => 'Paul Camilli', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // 15
        ];

        DB::table('artistes')->insert($artistes);
    }
}
