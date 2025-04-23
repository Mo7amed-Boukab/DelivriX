<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Administrateur extends Model
{
    use HasFactory;
    protected $table = 'administrateurs';
    protected $fillable = [
        'nom_entreprise',
        'description',
        'chiffre_affaire',
        'utilisateur_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
