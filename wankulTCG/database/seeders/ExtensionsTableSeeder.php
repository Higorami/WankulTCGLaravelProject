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
            ['name_extension' => 'Duelist Alliance', 'description_extension' => 'Définitivement un set Wankul qui ne pose aucun problème au niveau des droits par rapport à un certain jeu de cartes contenant des marionnettes au sein de Duelist Alliance.', 'code_extension' => 'DUEA', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('extensions')->insert($extensions);
    }
}
