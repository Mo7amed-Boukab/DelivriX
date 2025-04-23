<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes';
    protected $fillable = [
        'commande_number',
        'nom_produit',
        'details_produit',
        'quantite',
        'prix',
        'total_a_payer',
        'paiement_type',
        'paiement_status',
        'livraison_status',
        'commande_statut',
        'utilisateur_id',
        'livreur_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function livreur()
    {
        return $this->belongsTo(Livreur::class);
    }

    public function reduction()
    {
        return $this->hasOne(Reduction::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function colis()
    {
        return $this->hasOne(Colis::class);
    }

    public function historiqueCommandes()
    {
        return $this->hasMany(HistoriqueCommande::class);
    }
}
