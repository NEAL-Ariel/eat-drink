<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produit;
use App\Models\Stand;
use App\Models\Commande;

class EntrepreneurController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if ($user->role !== 'entrepreneur_approuve') {
            return redirect()->route('entrepreneur.attente');
        }
        return view('entrepreneur.dashboard', compact('user'));
    }

    public function attente()
    {
        return view('entrepreneur.attente');
    }

    public function produits()
    {
        $user = Auth::user();
        $stand = Stand::where('utilisateur_id', $user->id)->first();
        $produits = $stand ? $stand->produits : collect();
        return view('entrepreneur.produits.index', compact('produits'));
    }

    public function createProduit()
    {
        return view('entrepreneur.produits.create');
    }

    public function storeProduit(Request $request)
    {
        $user = Auth::user();
        $stand = Stand::firstOrCreate([
            'utilisateur_id' => $user->id
        ], [
            'nom_stand' => $user->nom_entreprise ?: ('Stand de ' . $user->email),
            'description' => ''
        ]);
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only('nom', 'description', 'prix');
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('produits', 'public');
            $data['image_url'] = '/storage/' . $path;
        } else {
            $data['image_url'] = null;
        }
        $stand->produits()->create($data);
        return redirect()->route('entrepreneur.produits')->with('success', 'Produit ajouté.');
    }

    public function editProduit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('entrepreneur.produits.edit', compact('produit'));
    }

    public function updateProduit(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only('nom', 'description', 'prix');
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('produits', 'public');
            $data['image_url'] = '/storage/' . $path;
        }
        $produit->update($data);
        return redirect()->route('entrepreneur.produits')->with('success', 'Produit modifié.');
    }

    public function deleteProduit($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('entrepreneur.produits')->with('success', 'Produit supprimé.');
    }

    public function commandes()
    {
        $user = Auth::user();
        $stand = Stand::where('utilisateur_id', $user->id)->first();
        $commandes = $stand ? $stand->commandes : collect();
        return view('entrepreneur.commandes', compact('commandes'));
    }
} 