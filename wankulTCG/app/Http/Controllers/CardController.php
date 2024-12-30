<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Extension;
use App\Models\Card_client;
use Illuminate\Http\Request;

class CardController extends Controller
{
    // Récupérer toutes les cartes
    public function getAllCards()
    {
        $cards = Card::all();
        return response()->json($cards);
    }

    // Récupérer les cartes d'une extension spécifique (par son id)
    public function getCardsBooster($idExtension)
    {
        $cardsCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', 1)->get();
        $cardsNonCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', '!=', 1)->get();

        // tirage de 5 cartes communes et 1 carte non commune
        $cards = $cardsCommunes->random(5)->merge($cardsNonCommunes->random(1));

        return response()->json($cards);
    }

    // Récupérer le prix d'une carte par son ID
    public function getPriceCard($idCard)
    {
        $card = Card::find($idCard);
        if (!$card) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        return response()->json(['price' => $card->price]);
    }
}
