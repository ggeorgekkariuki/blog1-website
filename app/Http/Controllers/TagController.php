<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagController extends Controller
{
    //Once the path is /posts/tags/{tag} we are directed here
    public function index(Tag $tag ){

        $posts = $tag -> posts;

        return view('posts.index', compact('posts'));
    }
}
