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
        $cards = Card::with('artiste', 'rarete', 'extension')->paginate(20); // Limité à 20 cartes par page
        return response()->json($cards);
    }


    // Récupérer les cartes d'une extension spécifique (par son id)
    public function getCardsBooster($idExtension)
    {
        $extension = Extension::find($idExtension);

        if (!$extension) {
            return response()->json(['message' => 'Extension not found'], 404);
        }

        $cardsCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', 1)->get();
        $cardsNonCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', '!=', 1)->get();

        if ($cardsCommunes->count() < 5 || $cardsNonCommunes->count() < 1) {
            return response()->json(['message' => 'Not enough cards in this extension'], 400);
        }

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

        return response()->json([
            'id' => $card->id_Card,
            'name' => $card->name_card,
            'price' => $card->price,
        ]);
    }

    public function userCards()
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos decks.');
        }

        // Récupérer les 5 decks de l'utilisateur
        $decks = $user->decks()->take(5)->get();  // On récupère les 5 premiers decks de l'utilisateur

        // Récupérer les cartes de l'utilisateur
        $cards = $user->cards()->with('artiste', 'rarete', 'extension')->get();

        // Retourner la vue avec les cartes et les decks
        return view('cards', compact('cards', 'decks'));
    }


}
