<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function create($index)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un deck.');
        }

        // Créer le deck
        $deck = Deck::create([
            'user_id' => $user->id,
            'name_deck' => 'Deck ' . $index, // Par défaut, le nom sera "Deck X"
        ]);

        // Rediriger vers la page du deck nouvellement créé
        return redirect()->route('decks.show', $deck->id_Deck);
    }

    public function show($id)
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir ce deck.');
        }

        // Récupérer les cartes de l'utilisateur
        $userCards = $user->cards()->get(); // Assumez que la relation 'cards' existe dans le modèle User

        // Récupérer le deck
        $deck = Deck::with('cards')->findOrFail($id);

        // Cartes du deck
        $deckCards = $deck->cards;

        // Retourner la vue avec les données
        return view('deck', compact('userCards', 'deck', 'deckCards'));
    }


    public function addCard(Request $request, $id)
    {
        $user = auth()->user();

        // Vérifier que la carte existe pour l'utilisateur et obtenir la quantité disponible
        $userCard = $user->cards()->where('card_id', $request->card_id)->first();
        if (!$userCard) {
            return response()->json(['message' => 'Cette carte n\'appartient pas à l\'utilisateur.'], 400);
        }

        // Quantité maximale disponible pour l'utilisateur
        $userQuantity = $userCard->pivot->quantity;

        // Vérifier si la carte existe déjà dans le deck
        $deckCard = Deck::findOrFail($id)->cards()->where('card_id', $request->card_id)->first();

        if ($deckCard) {
            // Si la carte existe déjà, vérifier la quantité avant de l'ajouter
            $currentDeckQuantity = $deckCard->pivot->quantity;
            if ($currentDeckQuantity >= $userQuantity) {
                return response()->json(['message' => 'Vous ne pouvez pas ajouter plus de cartes que vous en possédez.'], 400);
            }

            // Sinon, incrémenter la quantité
            $deckCard->pivot->quantity++;
            $deckCard->pivot->save();
        } else {
            // Sinon, ajouter la carte au deck avec une quantité de 1
            Deck::findOrFail($id)->cards()->attach($request->card_id, ['quantity' => 1]);
        }

        return response()->json(['success' => true]);
    }

    public function removeCard(Request $request, $id)
    {
        $user = auth()->user();

        // Vérifier si la carte existe déjà dans le deck
        $deckCard = Deck::findOrFail($id)->cards()->where('card_id', $request->card_id)->first();

        if ($deckCard) {
            // Vérifier la quantité actuelle de la carte dans le deck
            $currentQuantity = $deckCard->pivot->quantity;

            if ($currentQuantity > 1) {
                // Si la quantité est supérieure à 1, réduire de 1
                $deckCard->pivot->quantity--;
                $deckCard->pivot->save();
            } else {
                // Si la quantité est 1, supprimer la carte du deck
                $deckCard->pivot->delete();
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['message' => 'La carte n\'est pas présente dans le deck.'], 400);
    }

}
