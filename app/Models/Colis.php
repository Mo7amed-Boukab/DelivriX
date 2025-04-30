<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colis extends Model
{
    use HasFactory;

    protected $table = 'colies';
    protected $fillable = [
        'colie_number',
        'poids',
        'longueur',
        'largeur',
        'hauteur',
        'date_sortie',
        'heure_sortie',
        'date_arrivee_estime',
        'statut',
        'id_commande'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande');
    }

    public function sauvegardes()
    {
        return $this->hasMany(ColisSauvegarde::class, 'id_colie');
    }
}
