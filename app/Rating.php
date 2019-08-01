<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'username', 'movie_id', 'movie_title', 'rating', 'ratings', 'total_ratings', 'poster'];

    public function rules(){
        return ["user_id" => "int", "rating" => "int", "username" => "required|string|min:2"];
    }
}
