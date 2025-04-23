<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoriqueCommande extends Model
{
    use HasFactory;

    protected $table = 'historique_commandes';
    protected $fillable = [
        'utilisateur_id',
        'commande_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}