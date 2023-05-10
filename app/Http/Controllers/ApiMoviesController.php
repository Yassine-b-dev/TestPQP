<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;
use Inertia\Inertia;

class ApiMoviesController extends Controller
{



    public function movieOfWeek(){


        $data = Movie::orderBy('created_at', 'desc')->paginate(20);
        /* $data = json_decode($data->getBody(), true);
        dd($data); */
        
        $listMovies = $data->toArray();
        
        
        return $listMovies["data"];
    }

    public function movieDetail($id){
        $film = Movie::findOrFail($id);
        
        // return Inertia::render('Movie', [
        //     'film' => "hello"
        // ]);

        //return Inertia::render('Movie', ['film' => $film]);
        return $film;
    }


    public function index()
    {
        return Movie::all();
    }



       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            
        ]);
    
        return Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $movie = Movie::find($id);

        $request->validate([
            'title' => 'required',
        ]);
    
        $movie->update($request->all());
    
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        
        return response()->json(['message' => 'Movie deleted successfully']);
    }

    // public function search(Request $request)
    // {
    // $searchTerm = $request->input('search');
    // $movies = Movie::where('title', 'like', "%$searchTerm%")->get();
    // return response()->json($movies);
    // }

}
