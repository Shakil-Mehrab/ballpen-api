<?php

namespace App\Future\Auth;

class PrepareAuthenticatedSession
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
        $request->session()->regenerate();

        $this->limiter->clear($request);

        return $next($request);
    }
}
