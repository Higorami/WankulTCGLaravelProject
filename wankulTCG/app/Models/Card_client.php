<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card_client extends Model
{
   // La table correspond à card_client
    protected $table = 'card_client';

    // Désactiver les timestamps si vous ne les souhaitez pas dans cette table pivot
    public $timestamps = true;

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}