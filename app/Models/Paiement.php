<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    protected $table = 'paiements';
    protected $fillable = [
        'id_colie',
        'date_paiement',
        'montant',
        'details'
    ];

    public function colis()
    {
        return $this->belongsTo(Colis::class, 'id_colie');
    }
}

