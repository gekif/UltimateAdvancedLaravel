<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class HackerAlertException extends Exception
{
    public function report()
    {
        Log::critical('Hacker tried to hack us today');
    }


    public function render()
    {
        return response()->json([
            'message' => 'Hacker, you got no luck today'
        ]);
    }
}
