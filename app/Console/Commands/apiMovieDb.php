<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiMovieDb extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'app:api-movie-db';
    
    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'YASSSSSSINEYASSSSSSINEYASSSSSSINEYASSSSSSINEYASSSSSSINEYASSSSSSINE';
    
    /**
    * Execute the console command.
    */
    public function handle()
    {
        $response = Http::asJson()
        ->get(config('services.tmdb.endpoint').'trending/movie/day?api_key='.config('services.tmdb.api'));
        $data = json_decode($response->getBody(), true);
        
        
        $listMovie = array();
        
        foreach ($data["results"] as $result) {
            $newItem = array(
                "title" => $result["title"],
                "description" => $result["overview"],
                "release_date" => $result["release_date"],
                "poster_path" => $result["poster_path"],
                "vote_average" => $result["vote_average"],
                "id" => $result["id"],
                
                // add other fields as necessary
            );
            array_push($listMovie, $newItem);
        }
        $this->info("Importation des films de la semaine dans la BDD !");
        foreach ($listMovie as $film) {
            
            $storedFilm = new Movie();
            $storedFilm->title = $film['title'];
            $storedFilm->description = $film['description'];
            $storedFilm->title = $film['title'];
            $storedFilm->description = $film['description'];
            $storedFilm->poster_path = $film['poster_path'];
            $storedFilm->vote_average = $film['vote_average'];
            $storedFilm->release_date = $film['release_date'];
            $storedFilm->id_api = $film['id'];
            $storedFilm->save();
        }

        $this->info("Fin de l'execution !");

    }
}
