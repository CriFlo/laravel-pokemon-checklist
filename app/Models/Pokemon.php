<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pokemon extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $appends = ['catched'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_pokemon');
    }

    public function getCatchedAttribute()
    {
        return Auth::user()->pokemons->contains($this->id);
    }
}
