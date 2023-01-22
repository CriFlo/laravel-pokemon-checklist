<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use \App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $pokemons = json_decode(Storage::disk('local')->get('pokemons.json'), true);
        $pokemons = json_decode(Storage::disk('local')->get('pokemonnames.json'), true);
        foreach ($pokemons as $pokemon) {
            // if($pokemon['id']>0){
                $pokemon_save = new Pokemon();
                $pokemon_save->name = $pokemon['name'];
                $pokemon_save->label = strtolower($pokemon['label']);

                $pokemon_save->save();
                // $this->setGeneration($pokemon_save, $pokemon['id']);

            // }
        }
    }

    private function setGeneration($pokemon_save, $pokemon)
    {

    }
}
