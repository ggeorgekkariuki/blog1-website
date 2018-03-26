<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function posts() {

        //A tag can belong to many posts
        return $this -> belongsToMany (Post::class);

    }

    //Usually, the id is the primary identifier. We want to change that to be
    //the name of the tag to be the identifier eg posts/tags/personal

    public function getRouteKeyName() {

        return 'name';
        
    }
}
