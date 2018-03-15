<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /* 
        These views are only for authenticated users a
     */
    public function __construct () {

        $this->middleware('auth')->except(['index', 'show']);

    }
    
    public function index() {

        $posts = Post::latest()->get();

        $archives = Post::selectRaw('year(created_at) AS year,
             monthname(created_at) AS month, count(*) AS published')
            ->groupBy ('year', 'month')
            ->get()
            ->toArray();

        return view('posts.index', compact('posts', 'archives'));
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

        // Post::create(
        //     ['title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->user()->id]
        // );

        //Only a signed in user can publish a post
        auth()->user()->publish(

            new Post(request(['title', 'body']))

        );

        return redirect('/');
    }
}
