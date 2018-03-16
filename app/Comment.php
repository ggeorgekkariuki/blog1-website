<?php

namespace App;

class Comment extends Model
{
    //This function finds all the comments belonging to a post
    public function post() {

        return $this->belongsTo(Post::class);

    }

    //This function finds the comment belonging to a user
    public function user() {

        return $this->belongsTo(User::class);

    }

    public function submitComment(Comment $comment) {

        // auth()->user()->submitComment(

        //     new Comment(request('body'))

        // );

        $this -> user() -> save($comment);

    }
}
