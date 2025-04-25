<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'clients';
    protected $fillable = ['id'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_client');
    }
}
