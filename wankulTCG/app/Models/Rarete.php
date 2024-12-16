<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rarete extends Model
{
    protected $table = 'raretes';  // Nom de la table

    // Indiquer explicitement que id_rarete est la clé primaire
    protected $primaryKey = 'id_rarete';

    // Spécifier que la clé primaire est auto-incrémentée (optionnel)
    public $incrementing = true;

    // Définir les relations, si nécessaire
    public function cards()
    {
        return $this->hasMany(Card::class, 'rarete_id');
    }
}
