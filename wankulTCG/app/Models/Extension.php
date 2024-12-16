<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table = 'extensions';  // Nom de la table

    // Indiquer explicitement que id_Extension est la clé primaire
    protected $primaryKey = 'id_Extension';

    // Spécifier que la clé primaire est auto-incrémentée (optionnel)
    public $incrementing = true;

    // Définir les relations, si nécessaire
    public function cards()
    {
        return $this->hasMany(Card::class, 'extension_id');
    }
}
