<?php

namespace App\Http\Controllers\Users\Tokens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTokenIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        return  [
            'tokens' => $request->user()->tokens->map(function ($token) {
                return $token->toArray() + [
                    'last_used_ago' => optional($token->last_used_at)->diffForHumans(),
                ];
            }),
        ];
    }
}
