<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExposantController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/exposants', [ExposantController::class, 'index'])->name('exposants.index');
Route::get('/exposants/{id}', [ExposantController::class, 'show'])->name('exposants.show');

Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::post('/panier/retirer', [PanierController::class, 'retirer'])->name('panier.retirer');
Route::post('/panier/commander', [PanierController::class, 'commander'])->name('panier.commander');

Route::get('/commande/confirmation', function () {
    return view('commande.confirmation');
})->name('commande.confirmation');

Route::middleware(['auth'])->group(function () {
    Route::get('/entrepreneur/dashboard', [EntrepreneurController::class, 'dashboard'])->name('entrepreneur.dashboard');
    Route::get('/entrepreneur/attente', [EntrepreneurController::class, 'attente'])->name('entrepreneur.attente');
    Route::get('/entrepreneur/produits', [EntrepreneurController::class, 'produits'])->name('entrepreneur.produits');
    Route::get('/entrepreneur/produits/create', [EntrepreneurController::class, 'createProduit'])->name('entrepreneur.produits.create');
    Route::post('/entrepreneur/produits', [EntrepreneurController::class, 'storeProduit'])->name('entrepreneur.produits.store');
    Route::get('/entrepreneur/produits/{id}/edit', [EntrepreneurController::class, 'editProduit'])->name('entrepreneur.produits.edit');
    Route::post('/entrepreneur/produits/{id}/update', [EntrepreneurController::class, 'updateProduit'])->name('entrepreneur.produits.update');
    Route::post('/entrepreneur/produits/{id}/delete', [EntrepreneurController::class, 'deleteProduit'])->name('entrepreneur.produits.delete');
    Route::get('/entrepreneur/commandes', [EntrepreneurController::class, 'commandes'])->name('entrepreneur.commandes');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/demandes', [AdminController::class, 'demandes'])->name('admin.demandes');
    Route::post('/admin/demandes/{id}/approuver', [AdminController::class, 'approuver'])->name('admin.demandes.approuver');
    Route::post('/admin/demandes/{id}/rejeter', [AdminController::class, 'rejeter'])->name('admin.demandes.rejeter');
    Route::get('/admin/commandes', [AdminController::class, 'commandes'])->name('admin.commandes');
});
