<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';  // Nom de la table

    // Indiquer explicitement que id_Client est la clé primaire
    protected $primaryKey = 'id_Client';

    // Spécifier que la clé primaire est auto-incrémentée (optionnel)
    public $incrementing = true;

    // Si vous ne souhaitez pas que password soit récupéré ou affiché automatiquement, vous pouvez le protéger
    protected $hidden = ['password'];  // Le mot de passe sera caché dans les résultats de l'API ou quand on récupère les données

    // Vous pouvez définir d'autres propriétés ou méthodes selon vos besoins
}
