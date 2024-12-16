<?php

namespace App\Http\Controllers;

use App\Models\Ligne_deck;
use Illuminate\Http\Request;

class LigneDeckController extends Controller
{
    // Récupérer toutes les lignes d'un deck
    public function getAllLigneDeck($idDeck)
    {
        $ligneDecks = Ligne_deck::where('deck_id', $idDeck)->get();
        return response()->json($ligneDecks);
    }

    // Supprimer une ligne d'un deck
    public function deleteLigneDeck($idDeck, $idCard)
    {
        $ligneDeck = Ligne_deck::where('deck_id', $idDeck)->where('card_id', $idCard)->first();
        if (!$ligneDeck) {
            return response()->json(['message' => 'Ligne not found'], 404);
        }

        $ligneDeck->delete();
        return response()->json(['message' => 'Ligne deleted']);
    }

    // Ajouter une ligne à un deck
    public function addLigneDeck($idDeck, $idCard)
    {
        $ligneDeck = new Ligne_deck();
        $ligneDeck->deck_id = $idDeck;
        $ligneDeck->card_id = $idCard;
        $ligneDeck->quantity = 1;
        $ligneDeck->save();

        return response()->json(['message' => 'Ligne added to deck']);
    }

    // Augmenter la quantité d'une carte dans un deck
    public function increaseLigneDeck($idDeck, $idCard)
    {
        $ligneDeck = Ligne_deck::where('deck_id', $idDeck)->where('card_id', $idCard)->first();
        if (!$ligneDeck) {
            return response()->json(['message' => 'Ligne not found'], 404);
        }

        if ($ligneDeck->quantity < 3) {
            $ligneDeck->quantity++;
            $ligneDeck->save();
        }
        else {
            return response()->json(['message' => 'Maximum de carte atteint']);
        }

        return response()->json(['message' => 'Ligne quantity increased']);
    }

    // Diminuer la quantité d'une carte dans un deck
    public function decreaseLigneDeck($idDeck, $idCard)
    {
        $ligneDeck = Ligne_deck::where('deck_id', $idDeck)->where('card_id', $idCard)->first();
        if (!$ligneDeck) {
            return response()->json(['message' => 'Ligne not found'], 404);
        }

        if ($ligneDeck->quantity >= 1) {
            $ligneDeck->quantity--;
            $ligneDeck->save();
        }

        return response()->json(['message' => 'Ligne quantity decreased']);
    }
}
