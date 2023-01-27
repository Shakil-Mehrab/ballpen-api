<?php

namespace App\Providers;

use App\Future\Auth\Contracts\ResetsUserPasswords;
use App\Future\Auth\Contracts\UpdateProfilePhotos;
use App\Future\Auth\Contracts\UpdatesUserPasswords;
use App\Future\Auth\Contracts\UpdatesUserProfileInformation;
use App\Future\Auth\User\ResetUserPassword;
use App\Future\Auth\User\UpdateProfilePhoto;
use App\Future\Auth\User\UpdateUserPassword;
use App\Future\Auth\User\UpdateUserProfileInformation;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class FutureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('username', function () {
            return 'email';
        });

        $this->app->bind(StatefulGuard::class, function () {
            return Auth::guard('web');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton(ResetsUserPasswords::class, ResetUserPassword::class);
        app()->singleton(UpdatesUserProfileInformation::class, UpdateUserProfileInformation::class);
        app()->singleton(UpdatesUserPasswords::class, UpdateUserPassword::class);
        app()->singleton(UpdateProfilePhotos::class, UpdateProfilePhoto::class);
    }
}
