<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Client;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    // Récupérer les decks d'un client
    public function getDecksClient($idClient)
    {
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $decks = $client->decks; // Relation définie dans le modèle Client
        return response()->json($decks);
    }

    // Créer un deck pour un client
    public function createDeckClient($idClient)
    {
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $deck = new Deck();
        $deck->client_id = $idClient;
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
