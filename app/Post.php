<?php

namespace App;

class Post extends Model
{
    //This method finds ALL the comments to a post with post id
    public function comments() {

        return $this->hasMany(Comment::class);

    }

    //This function finds the user to a post
    public function user() {

        return $this->belongsTo(User::class);

    }

    //This function creates and saves a comment's body
    public function addComment($body) {

        $this -> comments() -> create(compact ('body'));
    }
}
