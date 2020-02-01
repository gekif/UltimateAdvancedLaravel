<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group create-post
     */
    public function testCanCreatePost()
    {
        // Arrange

        // Action
        $resp = $this->post('/store-post', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        // Assert
        $this->assertDatabaseHas('posts', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        $post = Post::findOrFail(1);

        $this->assertEquals('new post title', $post->title);
        $this->assertEquals('new post body', $post->body);

    }

}
