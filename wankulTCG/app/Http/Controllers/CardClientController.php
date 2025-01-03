<?php

namespace App\Http\Controllers;

use App\Models\Card_client;
use App\Models\User;
use App\Models\Card;
use App\Models\Extension;
use Illuminate\Http\Request;

class CardClientController extends Controller
{
    // Récupérer les cartes d'un user
    public function getCardUser($idUser)
    {
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $cards = $user->cards;  // Relation définie dans le modèle User
        return response()->json($cards);
    }

    // Récupérer une carte spécifique d'un user par leur ID
    public function getCardByIDCard($idCard, $idUser)
    {
        $cardClient = Card_client::where('user_id', $idUser)->where('card_id', $idCard)->first();
        if (!$cardClient) {
            return response()->json(['message' => 'Card not found in user collection'], 404);
        }

        return response()->json($cardClient);
    }

    // Ajouter une carte à la collection d'un user
    public function addCardToCollection($idCard, $idUser)
    {
        $cardClient = new Card_client();
        $cardClient->card_id = $idCard;
        $cardClient->user_id = $idUser;
        $cardClient->quantity = 1; // Par défaut, ajouter 1 carte
        $cardClient->save();

        return response()->json(['message' => 'Card added to collection']);
    }

    // Augmenter la quantité d'une carte dans la collection d'un user (si la carte est déjà présente sinon on l'ajoute)
    public function increaseCardQuantity($idCard, $idUser)
    {
        $cardClient = Card_client::where('user_id', $idUser)->where('card_id', $idCard)->first();
        if (!$cardClient) {
            // Si la carte n'existe pas dans la collection du user, on l'ajoute
            return $this->addCardToCollection($idCard, $idUser);
        }

        $cardClient->quantity++;
        $cardClient->save();

        return response()->json(['message' => 'Card quantity increased']);
    }

    // Afficher la page d'ouverture de booster
    public function getBoosterList($idUser)
    {
        // récupérer info user
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // récupérer liste extensions
        $extensions = Extension::all();

        // retourner la vue avec les données
        return view('booster-list', ['user' => $user, 'extensions' => $extensions]);
    }

    // Ouvrir un booster
    public function openBooster($idUser, $idExtension)
    {
        // récupérer les cartes du user appartenant à cette extension
        $cardsClient = Card_client::where('user_id', $idUser)->whereHas('card', function ($query) use ($idExtension) {
            $query->where('extension_id', $idExtension);
        })->get();

        // récupérer les cartes du booster
        $cardsCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', 1)->get();
        $cardsNonCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', '!=', 1)->get();

        // tirage de 5 cartes communes et 1 carte non commune
        $cards = $cardsCommunes->random(5)->merge($cardsNonCommunes->random(1));

        // ajouter les cartes au user ou les vendre si le user les possède déjà en 3 exemplaires
        foreach ($cards as $card) {
            $cardClient = $cardsClient->where('card_id', $card->id)->first();
            if ($cardClient) {
                if ($cardClient->quantity < 3) {
                    $cardClient->quantity++;
                    $cardClient->save();
                } else {
                    // vendre la carte
                    $user = User::find($idUser);
                    $user->money += $card->price;
                    $user->save();
                }
            } else {
                $cardClient = new Card_client();
                $cardClient->card_id = $card->id;
                $cardClient->user_id = $idUser;
                $cardClient->quantity = 1;
                $cardClient->save();
            }
        }

        return view('booster-opening', ['cards' => $cards]);
    }

    // Afficher la page d'achat des cartes
    public function marketBuy($idUser)
    {
        // récupérer info user
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // récupérer toutes les cartes
        $cards = Card::all();

        // filtrer les cartes déjà possédées par le user en retirant celles qui sont en quantité de 3 ou plus
        $cardsClient = Card_client::where('user_id', $idUser)->get();
        foreach ($cardsClient as $cardClient) {
            if ($cardClient->quantity >= 3) {
                $cards = $cards->reject(function ($card) use ($cardClient) {
                    return $card->id == $cardClient->card_id;
                });
            }
        }

        // retourner la vue avec les données
        return view('market', ['user' => $user, 'cards' => $cards]);
    }

    // Afficher la page d'achat des cartes filtrées par nom
    public function marketBuyFiltered($idUser, $name)
    {
        // récupérer info user
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // récupérer toutes les cartes
        $cards = Card::where('name', 'like', '%' . $name . '%')->get();

        // filtrer les cartes déjà possédées par
        $cardsClient = Card_client::where('user_id', $idUser)->get();
        foreach ($cardsClient as $cardClient) {
            if ($cardClient->quantity >= 3) {
                $cards = $cards->reject(function ($card) use ($cardClient) {
                    return $card->id == $cardClient->card_id;
                });
            }
        }

        // retourner la vue avec les données
        return view('market', ['user' => $user, 'cards' => $cards]);
    }

    // Acheter une carte sur le marché
    public function buyCard($idUser, $idCard)
    {
        // récupérer info user
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // récupérer info carte
        $card = Card::find($idCard);
        if (!$card) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        // vérifier si le user a assez d'argent
        if ($user->money < $card->price) {
            return response()->json(['message' => 'Not enough money'], 400);
        }

        // vérifier si le user possède déjà la carte
        $cardClient = Card_client::where('user_id', $idUser)->where('card_id', $idCard)->first();
        if ($cardClient) {
            if ($cardClient->quantity >= 3) {
                return response()->json(['message' => 'Card already owned'], 400);
            }
            $cardClient->quantity++;
            $cardClient->save();
        } else {
            $cardClient = new Card_client();
            $cardClient->card_id = $idCard;
            $cardClient->user_id = $idUser;
            $cardClient->quantity = 1;
            $cardClient->save();
        }

        // débiter le user
        $user->money -= $card->price;
        $user->save();

        return response()->json(['message' => 'Card bought']);
    }

}
