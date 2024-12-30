<?php

namespace App\Http\Controllers;

use App\Models\Card_client;
use App\Models\Client;
use App\Models\Extension;
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

    // Augmenter la quantité d'une carte dans la collection d'un client (si la carte est déjà présente sinon on l'ajoute)
    public function increaseCardQuantity($idCard, $idClient)
    {
        $cardClient = Card_client::where('client_id', $idClient)->where('card_id', $idCard)->first();
        if (!$cardClient) {
            // Si la carte n'existe pas dans la collection du client, on l'ajoute
            return $this->addCardToCollection($idCard, $idClient);
        }

        $cardClient->quantity++;
        $cardClient->save();

        return response()->json(['message' => 'Card quantity increased']);
    }

    // Afficher la page d'ouverture de booster
    public function getBoosterList($idClient)
    {
        // récupérer info client
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        // récupérer liste extensions
        $extensions = Extension::all();

        // retourner la vue avec les données
        return view('booster-opening', ['client' => $client, 'extensions' => $extensions]);
    }

}
