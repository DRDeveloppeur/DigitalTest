<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index($id) {
        $api = new ApiController();
        $user = Auth::user();
        $movie = $api->get_by_id("$id");
        $comments = (new CommentsController)->getMovieComments($movie['imdbID']);
        $ratings = Rating::orderBy('created_at', 'desc')->get();
        $new_ratings = null;
        $my_rate = null;
        if (!empty($ratings->all()) && $ratings->where('movie_id', $movie['imdbID'])->last()){
//            dd($ratings);
            $new_ratings = $ratings->where('movie_id', $movie['imdbID'])->last()->ratings;
        }
        $ratings = $ratings->all();

        if (!empty($user->id)) {
            $rating = Rating::where('user_id', $user->id)->where('movie_id', $movie['imdbID'])->get()->first();
            foreach ($ratings as $value){
                if ($value->user_id == $user->id && $value->movie_id == $movie['imdbID']) {
                    $my_rate = $rating->rating;
                }
            }
        }
        return view('movies.movie', compact('user', 'movie', 'comments', 'my_rate', 'ratings', 'new_ratings'));
    }
}
