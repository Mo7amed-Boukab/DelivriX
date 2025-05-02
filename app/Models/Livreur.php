<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livreur extends Model
{
    use HasFactory;

    protected $table = 'livreurs';
    protected $fillable = [
        'id',
        'nom_entreprise',
        'nom_livreur',
        'statut'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_livreur');
    }
    public function colie()
    {
        return $this->hasMany(Colis::class, 'id_livreur');
    }
}

