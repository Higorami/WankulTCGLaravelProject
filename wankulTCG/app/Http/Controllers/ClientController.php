<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Enregistrer un nouveau client
    public function registerClient(Request $request)
    {
        $client = new Client();
        $client->login = $request->login;
        $client->password = bcrypt($request->password);
        $client->email = $request->email;
        $client->save();

        return response()->json(['message' => 'Client registered']);
    }

    // Connecter un client
    public function connectClient(Request $request)
    {
        $client = Client::where('login', $request->login)->first();
        if (!$client || !\Hash::check($request->password, $client->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['message' => 'Client connected']);
    }

    // Récupérer les informations d'un client
    public function getInfoClient($idClient)
    {
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        return response()->json($client);
    }

    // Diminuer l'argent du client
    public function decreaseMoney($idClient, $montant)
    {
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $client->money -= $montant;
        $client->save();

        return response()->json(['message' => 'Money decreased']);
    }

    // Augmenter l'argent du client
    public function increaseMoney($idClient, $montant)
    {
        $client = Client::find($idClient);
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $client->money += $montant;
        $client->save();

        return response()->json(['message' => 'Money increased']);
    }
}
