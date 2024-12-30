<?php

namespace App\Http\Controllers;

use App\Models\Card_client;
use App\Models\Client;
use App\Models\Card;
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
        return view('booster-list', ['client' => $client, 'extensions' => $extensions]);
    }

    // Ouvrir un booster
    public function openBooster($idClient, $idExtension)
    {
        // récupérer les cartes du client appartenant à cette extension
        $cardsClient = Card_client::where('client_id', $idClient)->whereHas('card', function ($query) use ($idExtension) {
            $query->where('extension_id', $idExtension);
        })->get();

        // récupérer les cartes du booster
        $cardsCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', 1)->get();
        $cardsNonCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', '!=', 1)->get();

        // tirage de 5 cartes communes et 1 carte non commune
        $cards = $cardsCommunes->random(5)->merge($cardsNonCommunes->random(1));

        // ajouter les cartes au client ou les vendre si le client les possède déjà en 3 exemplaires
        foreach ($cards as $card) {
            $cardClient = $cardsClient->where('card_id', $card->id)->first();
            if ($cardClient) {
                if ($cardClient->quantity < 3) {
                    $cardClient->quantity++;
                    $cardClient->save();
                } else {
                    // vendre la carte
                    $client = Client::find($idClient);
                    $client->money += $card->price;
                    $client->save();
                }
            } else {
                $cardClient = new Card_client();
                $cardClient->card_id = $card->id;
                $cardClient->client_id = $idClient;
                $cardClient->quantity = 1;
                $cardClient->save();
            }
        }

        return view('booster-opening', ['cards' => $cards]);
    }

    // Afficher la page d'achat des cartes
    public function marketBuy($idClient)
    {
        // récupérer info client
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        // récupérer toutes les cartes
        $cards = Card::all();

        // filtrer les cartes déjà possédées par le client en retirant celles qui sont en quantité de 3 ou plus
        $cardsClient = Card_client::where('client_id', $idClient)->get();
        foreach ($cardsClient as $cardClient) {
            if ($cardClient->quantity >= 3) {
                $cards = $cards->reject(function ($card) use ($cardClient) {
                    return $card->id == $cardClient->card_id;
                });
            }
        }

        // retourner la vue avec les données
        return view('market', ['client' => $client, 'cards' => $cards]);
    }

    // Afficher la page d'achat des cartes filtrées par nom
    public function marketBuyFiltered($idClient, $name)
    {
        // récupérer info client
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        // récupérer toutes les cartes
        $cards = Card::where('name', 'like', '%' . $name . '%')->get();

        // filtrer les cartes déjà possédées par
        $cardsClient = Card_client::where('client_id', $idClient)->get();
        foreach ($cardsClient as $cardClient) {
            if ($cardClient->quantity >= 3) {
                $cards = $cards->reject(function ($card) use ($cardClient) {
                    return $card->id == $cardClient->card_id;
                });
            }
        }

        // retourner la vue avec les données
        return view('market', ['client' => $client, 'cards' => $cards]);
    }

    // Acheter une carte sur le marché
    public function buyCard($idClient, $idCard)
    {
        // récupérer info client
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        // récupérer info carte
        $card = Card::find($idCard);
        if (!$card) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        // vérifier si le client a assez d'argent
        if ($client->money < $card->price) {
            return response()->json(['message' => 'Not enough money'], 400);
        }

        // vérifier si le client possède déjà la carte
        $cardClient = Card_client::where('client_id', $idClient)->where('card_id', $idCard)->first();
        if ($cardClient) {
            if ($cardClient->quantity >= 3) {
                return response()->json(['message' => 'Card already owned'], 400);
            }
            $cardClient->quantity++;
            $cardClient->save();
        } else {
            $cardClient = new Card_client();
            $cardClient->card_id = $idCard;
            $cardClient->client_id = $idClient;
            $cardClient->quantity = 1;
            $cardClient->save();
        }

        // débiter le client
        $client->money -= $card->price;
        $client->save();

        return response()->json(['message' => 'Card bought']);
    }

}
