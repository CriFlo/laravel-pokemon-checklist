<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Dashboard', [
            'generations' => Pokemon::pluck('generation')->unique(),
        ]);
    }

    public function pokemons($generation)
    {
        $pokemons = Pokemon::where('generation', $generation)->get();
        $pokemons->each(function ($pokemon) {
            $pokemon->isCaught = Auth::user()->pokemons->contains($pokemon->id);
        });
        return Inertia::render('Pokemons', [
            'pokemons' => $pokemons,
            'generation' => $generation,
        ]);
    }

    public function changeState($id)
    {
        $pokemons = Auth::user()->pokemons;
        if($pokemons->contains($id)) {
            Auth::user()->pokemons()->detach($id);
        } else {
            Auth::user()->pokemons()->attach($id);
        }
    }
}
