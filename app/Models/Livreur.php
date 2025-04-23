<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livreur extends Model
{
    use HasFactory;

    protected $table = 'livreurs';
    protected $fillable = [
        'nom_entreprise',
        'nom_livreur',
        'statut',
        'utilisateur_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}

