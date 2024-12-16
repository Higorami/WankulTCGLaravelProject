<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    // Récupérer toutes les extensions
    public function getAllExtensions()
    {
        $extensions = Extension::all();
        return response()->json($extensions);
    }
}
