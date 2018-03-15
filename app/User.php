<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //A user can have many posts
    //This function finds all posts by a user
    public function posts() {

        return $this->hasMany(Post::class);

    }

    //This function allows a user to publish a post
    public function publish(Post $post) {

        $this->posts()->save($post);
        
    }
}
