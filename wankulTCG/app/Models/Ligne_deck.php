<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ligne_deck extends Model
{
    // Nom de la table
    protected $table = 'ligne_deck';

    // Désactiver les timestamps si vous ne les souhaitez pas (optionnel)
    public $timestamps = true;

    // Vous pouvez définir des relations si nécessaire, bien que ce ne soit pas obligatoire ici

    // Relation avec la carte (une ligne_deck appartient à une carte)
    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    // Relation avec le deck (une ligne_deck appartient à un deck)
    public function deck()
    {
        return $this->belongsTo(Deck::class, 'deck_id');
    }
}
