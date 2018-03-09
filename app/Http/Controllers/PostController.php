<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {

        return view('posts.show', compact('post'));

    }

    public function create() {
        return view('create.create');
    }

    public function store() {
        //This validates the items in question
        $this -> validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        // This method both create a new post and save it
        //remember to use the protected in the model
        //also have a csrf_field method in the web page
        Post::create(request(['title', 'body']));

        return redirect('/');
    }
}
