<?php

namespace Tests\Feature;

use Gekifcast\Mail\ConfirmYourEmail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

//    use DatabaseMigrations;


    public function test_a_user_has_a_default_username_after_registration()
    {
        $this->post('/register', [
            'name' => 'Febrina Pujihastuti',
            'email' => 'f.pujihastuti@gmail.com',
            'password' => 'secret'
        ])->assertRedirect();

        $this->assertDatabaseHas('users', [
            'username' => str_slug('Febrina Pujihastuti')
        ]);
    }


    public function test_an_email_is_sent_to_newly_registered_users()
    {
        $this->withoutExceptionHandling();

        Mail::fake();

        // register new user
        $this->post('/register', [
            'name' => 'kati frantz',
            'email' => 'kati@frantz.com',
            'password' => 'secret'
        ])->assertRedirect();

        //assert that a particular email was sent
        Mail::assertQueued(ConfirmYourEmail::class);
    }
}
