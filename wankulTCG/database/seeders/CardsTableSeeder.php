<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            [
                'name_card' => 'Ouvrier',
                'imageName' => 'Ouvrier.jpg',
                'description_card' => 'Son petit secret ?  Il a 1/10 à chaque œil.',
                'price' => 0.02,
                'artiste_id' => 5,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Coiffeuse',
                'imageName' => 'Coiffeuse.jpg',
                'description_card' => 'Quatre oreilles coupées et trois yeux éborgnés seulement !',
                'price' => 0.02,
                'artiste_id' => 5,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Francais',
                'imageName' => 'Francais.jpg',
                'description_card' => 'La classe à la française.',
                'price' => 0.10,
                'artiste_id' => 3,
                'rarete_id' => 2,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Samourabstrait',
                'imageName' => 'Samourabstrait.jpg',
                'description_card' => 'Doraggu wo yarisugita',
                'price' => 5.45,
                'artiste_id' => 1,
                'rarete_id' => 3,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Bob Lennon',
                'imageName' => 'BobLennon.jpg',
                'description_card' => 'Son surnom "Pyro-Barabare" lui a été attribué suite aux tristes événements de Notre-Dame de Paris',
                'price' => 50.00,
                'artiste_id' => 4,
                'rarete_id' => 4,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('cards')->insert($cards);
    }
}
