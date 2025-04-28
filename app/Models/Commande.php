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
        'date_commande',
        'id_client',
        'id_livreur'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function livreur()
    {
        return $this->belongsTo(Livreur::class, 'id_livreur');
    }


    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_commande');
    }

    public function colis()
    {
        return $this->hasMany(Colis::class, 'id_commande');
    }

    public function historiqueCommandes()
    {
        return $this->hasMany(HistoriqueCommande::class);
    }
}
