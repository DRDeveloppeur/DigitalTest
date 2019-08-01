<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function getMovieComments($id) {
        $comments = Comment::where('movie_id', $id)->orderBy('created_at', 'asc')->get();

        return $comments;
    }

    public function store(Request $request) {
        Comment::create([
            'user_id' => $request->get('user_id'),
            'username' => $request->get('username'),
            'movie_title' => $request->get('movie_title'),
            'movie_id' => $request->get('movie_id'),
            'comment' => $request->get('comment'),
            'poster' => $request->get('poster'),
        ]);

        return redirect(route('movie', ["id" => $request->get('movie_id')]))->with('success', "Votre commentaire as bien été publié.");
    }

    public function delete($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect(route('movie', ["id" => $comment->movie_id]))->with('success', "Votre commentaire as bien été supprimé.");
    }
}
