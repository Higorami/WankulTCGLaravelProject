<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Appeler le seeder spécifique
        $this->call(UsersTableSeeder::class);

        // Vous pouvez appeler d'autres seeders si nécessaire
        // $this->call(OtherTableSeeder::class);
    }
}
