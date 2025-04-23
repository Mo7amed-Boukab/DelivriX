<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reduction extends Model
{
    use HasFactory;

    protected $table = 'reductions';
    protected $fillable = [
        'nom_reduction',
        'montant_reduction',
        'commande_id'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
