<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = [
        'titre',
        'message',
        'statut',
        'id_utilisateur'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}