<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ], [
            'nom_entreprise.required' => 'Le nom de l\'entreprise est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        $user = User::create([
            'nom_entreprise' => $request->nom_entreprise,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'entrepreneur_en_attente',
            'statut' => 'en_attente',
        ]);

        Auth::login($user);
        return redirect()->route('entrepreneur.attente');
    }
} 