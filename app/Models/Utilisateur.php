<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs'; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'phone',
        'ville',
        'adresse',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function colisSauvegarde()
    {
        return $this->hasMany(ColisSauvegarde::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'id'); // Assumes client.id = utilisateur.id
    }
}
