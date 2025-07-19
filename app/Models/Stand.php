<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = [
        'nom_stand',
        'description',
        'utilisateur_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
