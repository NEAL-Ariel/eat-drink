<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stand;
use App\Models\Commande;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $nbUsers = User::count();
        $nbStands = Stand::count();
        $nbCommandes = Commande::count();
        return view('admin.dashboard', compact('nbUsers', 'nbStands', 'nbCommandes'));
    }

    public function demandes()
    {
        $demandes = User::where('role', 'entrepreneur_en_attente')->where('statut', 'en_attente')->get();
        return view('admin.demandes', compact('demandes'));
    }

    public function approuver($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'entrepreneur_approuve';
        $user->statut = 'approuve';
        $user->save();
        Stand::firstOrCreate([
            'utilisateur_id' => $user->id
        ], [
            'nom_stand' => $user->nom_entreprise ?: ('Stand de ' . $user->email),
            'description' => ''
        ]);
        // TODO: Envoyer un email de notification
        return redirect()->route('admin.demandes')->with('success', 'Demande approuvée.');
    }

    public function rejeter(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = 'entrepreneur_en_attente';
        $user->statut = 'rejete';
        $user->save();
        // TODO: Enregistrer le motif si besoin
        return redirect()->route('admin.demandes')->with('success', 'Demande rejetée.');
    }

    public function commandes()
    {
        $commandes = Commande::with('stand.user')->orderByDesc('date_commande')->get();
        return view('admin.commandes', compact('commandes'));
    }
} 