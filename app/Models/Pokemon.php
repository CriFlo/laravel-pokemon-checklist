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

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            if ($model->id > 0 && $model->id < 152) {
                $model->generation = 'Kanto';
            } elseif ($model->id > 151 && $model->id < 252) {
                $model->generation = 'Johto';
            } elseif ($model->id > 251 && $model->id < 387) {
                $model->generation = 'Hoenn';
            } elseif ($model->id > 386 && $model->id < 494) {
                $model->generation = 'Sinnoh';
            } elseif ($model->id > 493 && $model->id < 650) {
                $model->generation = 'Unova';
            } elseif ($model->id > 649 && $model->id < 722) {
                $model->generation = 'Kalos';
            } elseif ($model->id > 721 && $model->id < 810) {
                $model->generation = 'Alola';
            } elseif ($model->id > 809 && $model->id < 906) {
                $model->generation = 'Galar';
            } elseif ($model->id > 905 ) {
                $model->generation = 'Paldea';
            }
            $model->save();
        });
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_pokemon');
    }

    public function getCatchedAttribute()
    {
        return Auth::user()->pokemons->contains($this->id);
    }
}
