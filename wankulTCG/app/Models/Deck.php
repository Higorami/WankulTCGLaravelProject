<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $table = 'decks';  // Nom de la table

    // Indiquer explicitement que id_Deck est la clé primaire
    protected $primaryKey = 'id_Deck';

    // Spécifier que la clé primaire est auto-incrémentée (optionnel)
    public $incrementing = true;

    // Définir les relations, si nécessaire, par exemple, avec des cartes (via LIGNE_DECK)
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class, 'ligne_deck', 'deck_id', 'card_id')
                    ->withPivot('quantity');
    }
}
