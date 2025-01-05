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

            // extension ORIGINS

            // rarete 1
            [
                'name_card' => 'Annabelle',
                'imageName' => 'Annabelle.webp',
                'description_card' => 'Aucun de ses propriétaires n\'a jamais eu à se plaindre d\'elle (ils sont tous morts).',
                'price' => 0.02,
                'artiste_id' => 7,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Grudge',
                'imageName' => 'Grudge.webp',
                'description_card' => 'Elle fait peur comme ça, mais en réalité, si on apprend à la connaître, elle est super sympa.',
                'price' => 0.02,
                'artiste_id' => 7,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Infecté',
                'imageName' => 'Infecté.webp',
                'description_card' => '"Eeeeeuuuh... zbaaaarg mhhhh oooooergggg !"',
                'price' => 0.02,
                'artiste_id' => 8,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Débile',
                'imageName' => 'Débile.webp',
                'description_card' => 'Inventeur de la paille saucisse et de l\'oeuf sur PC, il est désormais étudié pour son "intelligence".',
                'price' => 0.02,
                'artiste_id' => 9,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Camionneur',
                'imageName' => 'Camionneur.webp',
                'description_card' => 'Souvent vu sur l\'A1 à 150 km/h, avec du pinard, un sandwich rosette et Johnny à fond dans la cabine.',
                'price' => 0.02,
                'artiste_id' => 10,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Vendeur',
                'imageName' => 'Vendeur.webp',
                'description_card' => 'Vu à la télé, Socisseau est LA révolution de la saucisse sous vide au goût douteux !',
                'price' => 0.02,
                'artiste_id' => 10,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Garagiste',
                'imageName' => 'Garagiste.webp',
                'description_card' => 'Sur le côté droit, on trouve la jauge à huile. Sur le côté gauche, on trouve le côté gauche.',
                'price' => 0.02,
                'artiste_id' => 10,
                'rarete_id' => 1,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // rarete 2
            [
                'name_card' => 'Survivant',
                'imageName' => 'Survivant.webp',
                'description_card' => 'Pour survivre, il a dû faire des choses horribles, comme boire l\'eau du robinet.',
                'price' => 0.10,
                'artiste_id' => 7,
                'rarete_id' => 2,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // rarete 3
            [
                'name_card' => 'Sel',
                'imageName' => 'Sel.webp',
                'description_card' => 'Quand il s\'énerve, il est capable de déverser plus de sel que toute la mer Méditerranée.',
                'price' => 5.45,
                'artiste_id' => 8,
                'rarete_id' => 3,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Joueur du grenier',
                'imageName' => 'JDG.webp',
                'description_card' => 'Il a oeuvré toute sa vie contre l\'addiction aux drogues chez les développeurs de jeux.',
                'price' => 5.45,
                'artiste_id' => 10,
                'rarete_id' => 3,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // rarete 5
            [
                'name_card' => 'Laink',
                'imageName' => 'Laink.webp',
                'description_card' => 'C\'est ici que...',
                'price' => 200.00,
                'artiste_id' => 11,
                'rarete_id' => 5,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Terracid',
                'imageName' => 'Terracid.webp',
                'description_card' => '... tout a commencé.',
                'price' => 200.00,
                'artiste_id' => 11,
                'rarete_id' => 5,
                'extension_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // extension CAMPUS

            // rarete 1
            [
                'name_card' => 'Moche',
                'imageName' => 'Moche.webp',
                'description_card' => 'Tout le monde l\'appelle Diogène alors que c\'est pourtant pas son prénom. Incompréhensible !',
                'price' => 0.02,
                'artiste_id' => 12,
                'rarete_id' => 1,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Cambrioleur',
                'imageName' => 'Cambrioleur.webp',
                'description_card' => 'Il s\'entraîne en cambriolant les maisons de ses amis, un chic type.',
                'price' => 0.02,
                'artiste_id' => 13,
                'rarete_id' => 1,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Licorne',
                'imageName' => 'Licorne.webp',
                'description_card' => 'Gambade hilare dans les prairies en répétant "étalon du cul" sans arrêt. Un peu lourd.',
                'price' => 0.02,
                'artiste_id' => 11,
                'rarete_id' => 1,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Aristocrate',
                'imageName' => 'Aristocrate.webp',
                'description_card' => 'Connu pour sa générosité, ce gentilhomme a 76 chambres et fait dormir ses domestiques à l\'étable.',
                'price' => 0.02,
                'artiste_id' => 11,
                'rarete_id' => 1,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Braqueur',
                'imageName' => 'Braqueur.webp',
                'description_card' => 'Un petit nerveux qui a la fâcheuse tendance à tirer un peu trop près des civiles !',
                'price' => 0.02,
                'artiste_id' => 14,
                'rarete_id' => 1,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Livreur',
                'imageName' => 'Livreur.webp',
                'description_card' => 'Il déteste déranger les clients (n\'a pas touché une sonnette ou monté un étage depuis 2003).',
                'price' => 0.02,
                'artiste_id' => 15,
                'rarete_id' => 1,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_card' => 'Cosplayeur',
                'imageName' => 'Cosplayeur.webp',
                'description_card' => 'Il a cassé absolument tous les vases de la ville pour récolter 15 pièces (15 000€ de préjudices).',
                'price' => 0.02,
                'artiste_id' => 13,
                'rarete_id' => 1,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // rarete 2
            [
                'name_card' => 'Cache-cache',
                'imageName' => 'Cache.webp',
                'description_card' => 'Voilà maintenant 2 heures que je le cherche sur la carte, mais il reste introuvable.',
                'price' => 0.10,
                'artiste_id' => 9,
                'rarete_id' => 2,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // rarete 3
            [
                'name_card' => 'Immolator',
                'imageName' => 'Immolator.webp',
                'description_card' => 'Tout ce qu\'il veut, c\'est avoir un ami à serrer dans ses bras... mais il le fait cramer à chaque fois.',
                'price' => 5.45,
                'artiste_id' => 9,
                'rarete_id' => 3,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // rarete 5
            [
                'name_card' => 'Gamin',
                'imageName' => 'Gamin.webp',
                'description_card' => 'Avec 85h de colle, il est paradoxalement l\'élève qui a passé le plus de temps à l\'école.',
                'price' => 200.00,
                'artiste_id' => 10,
                'rarete_id' => 5,
                'extension_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],            

            // extension BATTLE

            // rarete 1
            [
                'name_card' => 'Ouvrier',
                'imageName' => 'Ouvrier.jpg',
                'description_card' => 'Son petit secret ?  Il a 1/10 à chaque œil.',
                'price' => 0.02,
                'artiste_id' => 5,
                'rarete_id' => 1,
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
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
                'extension_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('cards')->insert($cards);
    }
}
