<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    protected $table = 'paiements';
    protected $fillable = [
        'montant',
        'commande_id'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}

