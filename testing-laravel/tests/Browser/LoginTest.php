<?php

namespace Tests\Browser;

use App\Post;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;


    public function testAUserCanLogin()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });

    }


    public function testAUserCanViewPost()
    {
        $post = factory(Post::class)->create();

        $this->browse(function (Browser $browser) use ($post) {
            $browser->visit('/posts')
                ->clickLink('View Post Details')
                ->assertPathIs("/post/{$post->id}")
                ->assertSee($post->title)
                ->assertSee($post->body)
                ->assertSee($post->createdAt());
        });

    }


}