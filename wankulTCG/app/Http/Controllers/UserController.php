<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Enregistrer un nouvel utilisateur
    public function registerUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name; // Ajout du champ name
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->money = $request->money ?? 0; // Par défaut, l'argent est 0 si non fourni
        $user->save();

        return response()->json(['message' => 'User registered']);
    }

    // Connecter un utilisateur
    public function connectUser(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json(['message' => 'User connected']);
    }

    // Récupérer les informations d'un utilisateur
    public function getUserInfo($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // Diminuer l'argent de l'utilisateur
    public function decreaseMoney($id, $amount)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->money < $amount) {
            return response()->json(['message' => 'Insufficient funds'], 400);
        }

        $user->money -= $amount;
        $user->save();

        return response()->json(['message' => 'Money decreased']);
    }

    // Augmenter l'argent de l'utilisateur
    public function increaseMoney($id, $amount)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->money += $amount;
        $user->save();

        return response()->json(['message' => 'Money increased']);
    }
}
