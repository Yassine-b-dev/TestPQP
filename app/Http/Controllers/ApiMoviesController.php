<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;
use Inertia\Inertia;

class ApiMoviesController extends Controller
{
    public function movieOfWeek(){


        $data = Movie::all();
        /* $data = json_decode($data->getBody(), true);
        dd($data); */
        
        //$listMovies = $data->toArray();
        
        
        return "$data";
    }

    public function movieDetail($id){
        $film = Movie::findOrFail($id);
        
        return Inertia::render('Movie', [
            'film' => "hello"
        ]);
    }
}
