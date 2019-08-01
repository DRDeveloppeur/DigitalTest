<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Rating;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $comments = Comment::where('user_id', $user->id)->get();
        $ratings = Rating::where('user_id', $user->id)->get();
        $new_comments = [];
        $new_ratings = [];

        foreach ($comments as $comment){
            $new_comments[] = $comment;
        }
        foreach ($ratings as $rating){
            $new_ratings[] = $rating;
        }

        return view('home', compact('new_comments', 'new_ratings'));
    }
}
