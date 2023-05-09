<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ApiMoviesController extends Controller
{
    public function movieOfMonths(){

        $tmdb_id = 436270; //Black Adam (2022) Movie TMDB ID

        $response = Http::asJson()
            ->get(config('services.tmdb.endpoint').'trending/movie/day?api_key='.config('services.tmdb.api'));
            
        $data = json_decode($response->getBody(), true);

        
       return $data;
    }
}
