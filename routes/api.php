<?php

use App\Http\Controllers\Api\MoviesController;
use App\Http\Controllers\ApiMoviesController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNull;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("movies", [ApiMoviesController::class, 'movieOfWeek']);


Route::get("movies/{id}", [ApiMoviesController::class, 'movieDetail']);

Route::get("moviesList", [ApiMoviesController::class, 'index']);

Route::delete("movie/delete/{id}", [ApiMoviesController::class, 'destroy']);

Route::put("movies/{id}", [ApiMoviesController::class, 'update']);

Route::get('/moviesSearch', function (Request $request) {
    $movies = Movie::where('title', 'like', '%' . $request->search . '%')->get();
    if (empty($movies->toArray()) || is_null($request->search)) {
        return response()->json([]);
    }else{
        return response()->json($movies);
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
