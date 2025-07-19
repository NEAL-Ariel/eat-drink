<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Stand;
use App\Models\Commande;

class PanierController extends Controller
{
    public function index(Request $request)
    {
        $panier = session('panier', []);
        $produits = Produit::whereIn('id', array_keys($panier))->get();
        return view('panier.index', compact('produits', 'panier'));
    }

    public function ajouter(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
        ]);
        $panier = session('panier', []);
        $produitId = $request->produit_id;
        if (isset($panier[$produitId])) {
            $panier[$produitId]++;
        } else {
            $panier[$produitId] = 1;
        }
        session(['panier' => $panier]);
        return redirect()->route('panier.index')->with('success', 'Produit ajouté au panier.');
    }

    public function retirer(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
        ]);
        $panier = session('panier', []);
        $produitId = $request->produit_id;
        if (isset($panier[$produitId])) {
            unset($panier[$produitId]);
        }
        session(['panier' => $panier]);
        return redirect()->route('panier.index')->with('success', 'Produit retiré du panier.');
    }

    public function commander(Request $request)
    {
        $panier = session('panier', []);
        if (empty($panier)) {
            return redirect()->route('panier.index')->with('error', 'Votre panier est vide.');
        }
        $produits = Produit::whereIn('id', array_keys($panier))->get();
        $standIds = $produits->pluck('stand_id')->unique();
        foreach ($standIds as $standId) {
            $produitsStand = $produits->where('stand_id', $standId);
            $details = [];
            foreach ($produitsStand as $produit) {
                $details[] = [
                    'produit_id' => $produit->id,
                    'nom' => $produit->nom,
                    'quantite' => $panier[$produit->id],
                    'prix' => $produit->prix,
                ];
            }
            Commande::create([
                'stand_id' => $standId,
                'details_commande' => json_encode($details, JSON_UNESCAPED_UNICODE),
                'date_commande' => now(),
            ]);
        }
        session()->forget('panier');
        return redirect('/commande/confirmation');
    }
} 