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
    public function getBoosterList()
    {
        // récupérer info user
        $user = auth()->user(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos decks.');
        }

        // récupérer liste extensions
        $extensions = Extension::all();

        // retourner la vue avec les données
        return view('boosters-list', ['extensions' => $extensions]);
    }

    // Ouvrir un booster
    public function openBooster($idExtension)
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos decks.');
        }

        $idUser = $user->id;

        // récupérer les cartes du booster
        $cardsCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', 1)->get();
        $cardsNonCommunes = Card::where('extension_id', $idExtension)->where('rarete_id', '!=', 1)->get();

        // tirage de 5 cartes communes et 1 carte non commune
        $cards = $cardsCommunes->random(5)->merge($cardsNonCommunes->random(1));

        // ajouter les cartes au user ou les vendre si le user les possède déjà en 3 exemplaires
        foreach ($cards as $card) {
            // verif si card dans card client
            $cardClient = Card_client::where('user_id', $idUser)->where('card_id', $card->id_Card)->first();
            if ($cardClient) {
                if ($cardClient->quantity < 3) {
                    Card_client::where('user_id', $idUser)->where('card_id', $card->id_Card)->increment('quantity');
                    $card->sell = false;
                } else {
                    // vendre la carte
                    User::find($idUser)->increment('money', $card->price);
                    $card->sell = true;   
                }
            } else {
                $cardClient = new Card_client();
                $cardClient->card_id = $card->id_Card;
                $cardClient->user_id = $idUser;
                $cardClient->quantity = 1;
                $cardClient->save();
                $card->sell = false;
            }
        }

        return view('booster-opening', ['cards' => $cards]);
    }

    // Afficher la page d'achat des cartes
    public function marketBuy()
    {
        return $this->marketBuyMessageError('', '');
    }

    // Afficher la page d'achat des cartes avec message d'erreur
    public function marketBuyMessageError($message, $error, $name = '')
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos decks.');
        }

        $idUser = $user->id;

        // récupérer info user
        $user = User::find($idUser);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // récupérer toutes les cartes
        $cards = Card::all();

        // récupérer toutes les cartes
        $name = request('name');
        $cards = Card::where('name_card', 'like', '%' . $name . '%')->get();

        // filtrer les cartes déjà possédées par le user en retirant celles qui sont en quantité de 3 ou plus
        $cardsClient = Card_client::where('user_id', $idUser)->get();
        foreach ($cardsClient as $cardClient) {
            if ($cardClient->quantity >= 3) {
                $cards = $cards->reject(function ($card) use ($cardClient) {
                    return $card->id_Card == $cardClient->card_id;
                });
            }
        }

        // retourner la vue avec les données
        return view('market', ['user' => $user, 'cards' => $cards, 'message' => $message, 'error' => $error, 'name' => $name]);
    }

    // Acheter une carte sur le marché
    public function buyCard()
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos decks.');
        }

        $idUser = $user->id;

        // récupérer data du formulaire
        $idCard = request('card_id');

        // récupéré le nom si filtré
        $name = request('name');

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
            return $this->marketBuyMessageError('', 'Vous n\'avez pas assez d\'argent pour acheter cette carte.');
        }

        // vérifier si le user possède déjà la carte
        $cardClient = Card_client::where('user_id', $idUser)->where('card_id', $idCard)->first();
        if ($cardClient) {
            if ($cardClient->quantity >= 3) {
                return $this->marketBuyMessageError('', 'Vous possédez déjà cette carte en 3 exemplaires.');
            }
            Card_client::where('user_id', $idUser)->where('card_id', $idCard)->increment('quantity');
        } else {
            $cardClient = new Card_client();
            $cardClient->card_id = $idCard;
            $cardClient->user_id = $idUser;
            $cardClient->quantity = 1;
            $cardClient->save();
        }

        // débiter le user
        User::find($idUser)->decrement('money', $card->price);

        return $this->marketBuyMessageError('Carte achetée avec succès !', '', $name);
    }

}
