<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

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
}
