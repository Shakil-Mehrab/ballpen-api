<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(config('app.frontend_url'));
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['status' => 'verification-link-sent']);
    }
}
