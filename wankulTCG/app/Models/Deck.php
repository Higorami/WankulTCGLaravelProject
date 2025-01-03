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

    // Définir les relations, si nécessaire
    public function user()
    {
        // Relation avec la table users
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cards()
    {
        // Relation avec les cartes via la table pivot ligne_deck
        return $this->belongsToMany(Card::class, 'ligne_deck', 'deck_id', 'card_id')
            ->withPivot('quantity');
    }
}
