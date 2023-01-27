<?php

namespace App\Future\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class EnsureLoginIsNotThrottled
{
    /**
     * The login rate limiter instance.
     */
    protected $limiter;

    /**
     * Create a new class instance.
     *
     * @return void
     */
    public function __construct(LoginRateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  callable  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        if (! $this->limiter->tooManyAttempts($request)) {
            return $next($request);
        }

        event(new Lockout($request));

        return with($this->limiter->availableIn($request), function ($seconds) {
            throw ValidationException::withMessages([
                app('username') => [
                    trans('auth.throttle', [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]),
                ],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        });
    }
}
