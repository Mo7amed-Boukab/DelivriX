<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AdresseColis extends Model
{
    use HasFactory;

    protected $table = 'adresse_colis';
    protected $fillable = [
        'derniere_adresse',
        'colis_id'
    ];

    public function colis()
    {
        return $this->belongsTo(Colis::class);
    }
}

