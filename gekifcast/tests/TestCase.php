<?php

namespace Tests;

use Gekifcast\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Config;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    public function loginAdmin()
    {
        $user = factory(User::class)->create();

        Config::push('gekifcast.administrators', $user->email);

        $this->actingAs($user);
    }

}
