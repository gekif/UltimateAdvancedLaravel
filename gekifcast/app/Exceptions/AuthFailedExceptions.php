<?php

namespace Gekifcast\Exceptions;

use Exception;

class AuthFailedExceptions extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'These credentials do not match our records.'
        ], 422);
    }
}