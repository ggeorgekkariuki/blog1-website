<?php

namespace App;
use Carbon\Carbon;

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

        return $this -> comments() -> create(compact ('body'));
    }

    //A tag is a classification of a post eg personal, php, android etc
    public function tags() {

        //A post can belong to many tags
        return $this -> belongsToMany(Tag::class);

    }

    //This is a query scope
    public function scopeFilter ($query, $filters) {

        //This is where we match the month and the year that directs the path
        if($month = $filters['month']){

            $query->whereMonth('created_at', Carbon::parse($month)-> month);
            
        }
        if($year = $filters['year']){

            $query->whereYear('created_at', $year);
            
        }
        
    }

    public static function archives() {

        return static::selectRaw('year(created_at) AS year,
             monthname(created_at) AS month, count(*) AS published')
            ->groupBy ('year', 'month')
            ->orderByRaw ('min(created_at) desc')
            ->get()
            ->toArray();
    }


}
