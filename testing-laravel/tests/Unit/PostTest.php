<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group formatted -date
     */
    public function testCanGetCreatedAtFormattedDate()
    {
        // Arrange
//        $post = factory(Post::class, 1)->create();

        // Create A Post
        $post = Post::create([
            'title' => 'A Simple Title',
            'body' => 'A Simple Body'
        ]);

        // Action
        // Get the value by calling the method
        $formattedDate = $post->createdAt();
//        $formattedDate = $post->created_at->toFormattedDateString();

        // Assert
        // Assert that returned value is as we expect
        $this->assertEquals(
            $post->created_at->toFormattedDateString(), $formattedDate);
    }
}
