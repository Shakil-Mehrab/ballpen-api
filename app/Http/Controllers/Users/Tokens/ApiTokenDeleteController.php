<?php

namespace App\Http\Controllers\Users\Tokens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTokenDeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request, $tokenId)
    {
        return $request->user()->tokens()->where('id', $tokenId)->first()->delete();
    }
}
