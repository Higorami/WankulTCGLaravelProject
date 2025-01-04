<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
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

    // Relation avec les decks
    public function decks()
    {
        return $this->hasMany(Deck::class, 'user_id');
    }

    // Relation avec les cartes
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'card_client', 'user_id', 'card_id')
            ->withPivot('quantity');
    }
}
