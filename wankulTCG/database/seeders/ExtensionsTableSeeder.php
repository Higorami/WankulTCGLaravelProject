<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExtensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $extensions = [
            ['name_extension' => 'ORIGINS', 'description_extension' => 'Définitivement un set Wankul qui ne pose aucun problème au niveau des droits par rapport à un certain jeu de cartes contenant des marionnettes au sein de ORIGINS.', 'code_extension' => 'ORI', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_extension' => 'CAMPUS', 'description_extension' => 'Définitivement un set Wankul qui ne pose aucun problème au niveau des droits par rapport à un certain jeu de cartes contenant des marionnettes au sein de CAMPUS.', 'code_extension' => 'CAMP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_extension' => 'BATTLE', 'description_extension' => 'Définitivement un set Wankul qui ne pose aucun problème au niveau des droits par rapport à un certain jeu de cartes contenant des marionnettes au sein de BATTLE.', 'code_extension' => 'BATL', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('extensions')->insert($extensions);
    }
}
