<?php

namespace App\Http\Controllers;

use App\Models\Card_client;
use App\Models\Client;
use Illuminate\Http\Request;

class CardClientController extends Controller
{
    // Récupérer les cartes d'un client
    public function getCardClient($idClient)
    {
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $cards = $client->cards;  // Relation définie dans le modèle Client
        return response()->json($cards);
    }

    // Récupérer une carte spécifique d'un client par leur ID
    public function getCardByIDCard($idCard, $idClient)
    {
        $cardClient = Card_client::where('client_id', $idClient)->where('card_id', $idCard)->first();
        if (!$cardClient) {
            return response()->json(['message' => 'Card not found in client collection'], 404);
        }

        return response()->json($cardClient);
    }

    // Ajouter une carte à la collection d'un client
    public function addCardToCollection($idCard, $idClient)
    {
        $cardClient = new Card_client();
        $cardClient->card_id = $idCard;
        $cardClient->client_id = $idClient;
        $cardClient->quantity = 1; // Par défaut, ajouter 1 carte
        $cardClient->save();

        return response()->json(['message' => 'Card added to collection']);
    }
}
