<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    public function newRating(Request $request) {
        $api = new ApiController;
        $user = Auth::user();
        $movie = $api->get_by_id($request->get('movie_id'));

        //        Calcul new ratings
        $rating = $movie['imdbRating'] * $movie['imdbVotes'];
        $rating = $rating + $request->get('rate');
        $rating = $rating / ($movie['imdbVotes'] + 1);

        $ratings = Rating::all();
        $verif = $ratings->where('movie_id', $request->get('movie_id'))->where('user_id', $user->id);

        if (!empty($verif->first())) {
            $verif = $verif->first();
            //        Calcul update ratings
            $rating = $movie['imdbRating'] * $verif->total_ratings;
            $rating = $rating - $verif->rating;
            $rating = $rating + $request->get('rate');
            $rating = $rating / ($movie['imdbVotes'] + 1);
            $verif->update([
                'rating' => $request->get('rate'),
                'ratings' => $rating,
            ]);

            return redirect(route('movie', ["id" => $request->get('movie_id')]))->with('success', "Votre note à bien été mis à jour.");
        } else {
            Rating::create([
                'user_id' => $request->get('user_id'),
                'username' => $request->get('username'),
                'movie_id' => $request->get('movie_id'),
                'movie_title' => $request->get('movie_title'),
                'rating' => $request->get('rate'),
                'ratings' => $rating,
                'total_ratings' => ($movie['imdbVotes'] + 1),
                'poster' => $movie['Poster'],
            ]);

            return redirect(route('movie', ["id" => $request->get('movie_id')]))->with('success', "Votre note à bien été enregistré.");
        }

    }
}
