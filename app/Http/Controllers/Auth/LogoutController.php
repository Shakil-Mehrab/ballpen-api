<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(protected StatefulGuard $guard)
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return true;
    }
}
