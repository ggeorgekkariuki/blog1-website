<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

class ExampleTest extends TestCase
{
    //This will roll back and undo anything we have done to avoid having
    //many posts on every phpunit command
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */

     //1. phpunit.xml created a database path and assigned it to the blog_testing database
     //2. ModelFactory.php created a factory of creating fake posts
     //3. tests/Unit/ExampleTest.php created this test
     //4. Executed in vagrant using phpunit tests/Unit/ExampleTest.php


     

    public function testBasicTest()
    {
        //$this->assertTrue(true);

        //Given I have two posts a month apart
        $first = factory(Post::class) -> create();

        //This post was created a month before
        $second = factory(Post::class) -> create(

            ['created_at' => \Carbon\Carbon::now()->subMonth()]

        );

        //When I fetch the archives method in the Post Model
        $posts = Post::archives();
        //dd($posts);
        
        //The response should be in the proper format
        $this->assertEquals([
            //The first record
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 2
            ], 
            //The second record
            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 2
            ]
        ] , $posts);
    }
}
