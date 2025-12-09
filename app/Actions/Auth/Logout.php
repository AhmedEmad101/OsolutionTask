<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;

class logout
{
    public function execute(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
    }
}