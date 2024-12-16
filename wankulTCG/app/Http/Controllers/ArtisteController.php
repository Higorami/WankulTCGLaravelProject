<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    // Récupérer tous les artistes
    public function getAllArtiste(): \Illuminate\Http\JsonResponse
    {
        $artistes = Artiste::all();
        return response()->json($artistes);
    }
}
