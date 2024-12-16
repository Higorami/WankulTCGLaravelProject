<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    // Indiquer explicitement que id_Card est la clé primaire
    protected $primaryKey = 'id_Card';

    // Définir si la clé primaire est auto-incrémentée (optionnel, mais explicitement précisé)
    public $incrementing = true;

    public function artiste()
    {
        return $this->belongsTo(Artiste::class, 'artiste_id');
    }

    public function rarete()
    {
        return $this->belongsTo(Rarete::class, 'rarete_id');
    }

    public function extension()
    {
        return $this->belongsTo(Extension::class, 'extension_id');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'card_client', 'card_id', 'client_id')
                    ->withPivot('quantity');
    }
}
