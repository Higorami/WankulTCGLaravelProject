<?php

namespace App\Http\Controllers;

use App\Models\Rarete;
use Illuminate\Http\Request;

class RareteController extends Controller
{
    // Récupérer toutes les raretés
    public function getAllRarete()
    {
        $raretes = Rarete::all();
        return response()->json($raretes);
    }
}
