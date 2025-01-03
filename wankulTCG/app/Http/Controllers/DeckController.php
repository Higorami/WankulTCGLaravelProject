<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    // Récupérer les decks d'un user
    public function getDecksUser($idUser)
    {
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $decks = $user->decks; // Relation définie dans le modèle User
        return response()->json($decks);
    }

    // Créer un deck pour un user
    public function createDeckUser($idUser)
    {
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $deck = new Deck();
        $deck->user_id = $idUser;
        $deck->name_deck = 'New Deck';
        $deck->save();

        return response()->json(['message' => 'Deck created']);
    }

    // Mettre à jour le nom d'un deck
    public function updateNomDeck($idDeck, $name)
    {
        $deck = Deck::find($idDeck);
        if (!$deck) {
            return response()->json(['message' => 'Deck not found'], 404);
        }

        $deck->name_deck = $name;
        $deck->save();

        return response()->json(['message' => 'Deck name updated']);
    }

    // Supprimer un deck
    public function deleteDeck($idDeck)
    {
        $deck = Deck::find($idDeck);
        if (!$deck) {
            return response()->json(['message' => 'Deck not found'], 404);
        }

        $deck->delete();

        return response()->json(['message' => 'Deck deleted']);
    }
}
