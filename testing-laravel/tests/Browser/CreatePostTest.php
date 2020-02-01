<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends DuskTestCase
{
    use DatabaseMigrations;


    public function testAuthUserCanCreatePost()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/create-post')
                ->type('title', 'New post')
                ->type('body', 'New body')
                ->press('Save Post')
                ->assertPathIs('/posts')
                ->assertSee('New post')
                ->assertSee('New body');
        });

    }


    public function testOnlyAuthUserCanCreatePost()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/create-post')
                ->assertPathIs('/login');
        });

    }


}
