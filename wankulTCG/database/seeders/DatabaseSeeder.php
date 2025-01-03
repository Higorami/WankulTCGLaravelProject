<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RaretesTableSeeder::class);
        $this->call(ArtistesTableSeeder::class);
        $this->call(ExtensionsTableSeeder::class);
        $this->call(CardsTableSeeder::class);
    }
}
