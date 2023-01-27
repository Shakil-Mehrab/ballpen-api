<?php

namespace App\Http\Controllers\Users\Tokens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTokenStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $token = $request->user()->createToken(
            $request->name
        );

        return $token;
    }
}
