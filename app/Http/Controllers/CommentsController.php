<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    //Only an Authentic user can leave a comment
    public function __construct () {

        $this -> middleware('auth');

    }

    public function store(Post $post) {

        // $this->validate(request(), 
        //     ['body'=>'required|min:2']
        // );

        // Comment::create([
        //     'body' => request('body'),
        //     'post_id' => $post -> id
        // ]);


        auth() -> user() -> submitComment(

            $post->addComment(request('body'))
            
        );
        
        return back();
    }
}
