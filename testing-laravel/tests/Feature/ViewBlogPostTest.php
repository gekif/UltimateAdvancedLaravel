<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewBlogPostTest extends TestCase
{
    use DatabaseMigrations;


    public function testCanViewBlogPost()
    {
        // Arrangement
        // Creating a blog post
        $post = Post::create([
            'title' => 'A Simple Title',
            'body' => 'A Simple Body'
        ]);

        // Action
        // Visiting a route
        $resp = $this->get("/post/{$post->id}");

        // Assert
        // Assert status code 200
        $resp->assertStatus(200);

        // Assert that we see post title
        $resp->assertSee($post->title);

        // Assert that we see post body
        $resp->assertSee($post->body);

        // Assert that we see published date
        $resp->assertSee($post->created_at->toFormattedDateString());

    }


    /**
     * @group post-not-found
     */
    public function testViews404PageWhenPostIsNotFound()
    {
        // Action
        $resp = $this->get('post/INVALID_ID');

        // Assert
        $resp->assertStatus(404);
        $resp->assertSee("The page you are looking for could not be found");



    }


}
