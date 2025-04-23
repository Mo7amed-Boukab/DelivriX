<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colis extends Model
{
    use HasFactory;

    protected $table = 'colis';
    protected $fillable = [
        'colis_number',
        'poids',
        'longueur',
        'largeur',
        'hauteur',
        'date_sortie',
        'date_arrivee_estime',
        'statut',
        'commande_id'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function adresses()
    {
        return $this->hasMany(AdresseColis::class);
    }

    public function sauvegardes()
    {
        return $this->hasMany(ColisSauvegarde::class);
    }
}
