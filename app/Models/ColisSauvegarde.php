<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ColisSauvegarde extends Model
{
    use HasFactory;

    protected $table = 'colis_sauvegardes';
    protected $fillable = [
        'utilisateur_id',
        'colis_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function colis()
    {
        return $this->belongsTo(Colis::class);
    }
}