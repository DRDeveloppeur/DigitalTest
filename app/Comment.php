<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'movie_title', 'comment', 'username', 'movie_id', 'poster'];
}
