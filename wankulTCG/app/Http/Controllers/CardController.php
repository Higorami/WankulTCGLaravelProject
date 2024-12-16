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
        $extension = Extension::find($idExtension);
        if (!$extension) {
            return response()->json(['message' => 'Extension not found'], 404);
        }

        $cards = $extension->cards; // Si une relation a été définie dans le modèle Extension
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
