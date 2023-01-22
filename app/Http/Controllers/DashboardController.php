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
            'pokemons' => Pokemon::all(),
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
