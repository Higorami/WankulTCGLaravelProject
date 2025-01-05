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

            // extension 1

            // rarete 1
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
                'name_card' => 'Footballeur',
                'imageName' => 'Footballeur.webp',
                'description_card' => 'Personne ne le sait, mais sa stratégie aux tirs au but, c\'est "am stram gram".',
                'price' => 0.02,
                'artiste_id' => 6,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Golfeur',
                'imageName' => 'Golfeur.webp',
                'description_card' => 'Banni de la plupart des terrains pour avoir utilisé son club sur d\'autres choses que la balle.',
                'price' => 0.02,
                'artiste_id' => 6,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Skieur',
                'imageName' => 'Skieur.webp',
                'description_card' => 'Amateur de sensations fortes, il adore prendre les pistes vertes extrêmemement dangereuses.',
                'price' => 0.02,
                'artiste_id' => 6,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Wilson',
                'imageName' => 'Wilson.webp',
                'description_card' => 'Gentil petit ballon qui fait office d\'ami avec curieusement, un drôle de trou derrière la tête.',
                'price' => 0.02,
                'artiste_id' => 6,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Vieux',
                'imageName' => 'Vieux.webp',
                'description_card' => 'Il s\'assoit chaque jour sur son banc à 10h06 et distribue exactement 38g de graines aux pigeons.',
                'price' => 0.02,
                'artiste_id' => 6,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // rarete 2
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
            // rarete 3
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
            // rarete 4
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

            // extension 2
            
        ];

        DB::table('cards')->insert($cards);
    }
}
