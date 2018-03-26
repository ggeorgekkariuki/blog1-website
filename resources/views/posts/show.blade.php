@extends('layouts.master')

@section('content')

    <h1> {{$post -> title}} </h1>
    <hr>

    <!-- The tags of a post will appear here -->

    
        <ul>
            @foreach ($post -> tags as $tag)
            <li>
                <a href = "/posts/tags/{{$tag -> name}} ">
                    {{$tag -> name}}
                </a>
            </li>
            @endforeach
        </ul>
    

    {{$post -> body}}


    <div class="comments">
        <ul class="list-group">
            @foreach ($post->comments as $comment)
            <li class="list-group-item">
            
                <strong>
                {{$comment->created_at->diffForHumans() }} : &nbsp;           
                </strong>

                {{$comment -> body}}

            </li>
            @endforeach
        </ul>
    </div>

    <hr>

    <!--Adding a Comments section to the page  -->
    <form method = 'POST' action = '/posts/{{$post->id}}/comments ' >

            {{ csrf_field()}}

        <div class="form-group">
            <textarea name="body" id="body" class="form-control" 
            placeholder="Add comment here"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Comment</button>
        </div>

        @include('layouts.errors')

    </form>

@endsection

