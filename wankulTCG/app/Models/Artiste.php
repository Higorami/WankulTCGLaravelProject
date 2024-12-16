<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    protected $table = 'artistes';  // Nom de la table

    // Indiquer explicitement que id_artiste est la clé primaire
    protected $primaryKey = 'id_artiste';

    // Spécifier que la clé primaire est auto-incrémentée (optionnel)
    public $incrementing = true;

    // Définir les relations, si nécessaire
    public function cards()
    {
        return $this->hasMany(Card::class, 'artiste_id');
    }
}
