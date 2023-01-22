<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Storage;

class ImportImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to initially download all images';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pokemons = Pokemon::all()->pluck('label');
        // $pokemons = $pokemons->map(function ($pokemon) {
        //     return strtolower($pokemon);
        // });

        $bar = $this->output->createProgressBar(count($pokemons));
        $failed_imports = collect();
        foreach ($pokemons as $pokemon) {
            try{
                $url = "https://img.pokemondb.net/artwork/{$pokemon}.jpg";
                // $path = public_path("images/{$pokemon}.jpg");
                $path = Storage::disk('local')->put("images2/{$pokemon}.jpg", file_get_contents($url));
                file_put_contents($path, file_get_contents($url));
                $bar->advance();
            }catch(\Exception $e){
                $failed_imports->push($pokemon);
            }
        }
        $bar->finish();
        $this->info('Failed imports: ' . $failed_imports->implode(', '));
        return Command::SUCCESS;
    }
}
