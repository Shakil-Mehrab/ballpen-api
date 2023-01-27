<?php

namespace App\Http\Controllers\Auth;

use App\Future\Auth\Contracts\UpdatesUserPasswords;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(
        Request $request,
        UpdatesUserPasswords $updater
    ) {
        $updater->update($request->user(), $request->all());

        return response()->noContent();
    }
}
