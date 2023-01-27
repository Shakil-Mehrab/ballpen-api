<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordForgotController;
use App\Http\Controllers\Auth\ProfileInformationController;
use App\Http\Controllers\Auth\ProfilePhotoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Users\Sessions\DeleteOtherBrowserSessionsController;
use App\Http\Controllers\Users\Sessions\UserSessionsShowController;
use App\Http\Controllers\Users\Tokens\ApiTokenDeleteController;
use App\Http\Controllers\Users\Tokens\ApiTokenIndexController;
use App\Http\Controllers\Users\Tokens\ApiTokenStoreController;
use App\Http\Controllers\Users\UserProfileController;
use App\Http\Controllers\Users\UserProfilePhotoDeleteController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class);

Route::post('/login', LoginController::class);

Route::post('/forgot-password', PasswordForgotController::class);

Route::post('/reset-password', NewPasswordController::class);

Route::post('/logout', LogoutController::class);

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', EmailVerificationNotificationController::class)
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::prefix('user')->group(function () {
    // Profile
    Route::get('/profile', UserProfileController::class);
    Route::put('/profile-information', ProfileInformationController::class);
    Route::put('/profile-photo', ProfilePhotoController::class);

    Route::put('/password', PasswordController::class);
    Route::delete('/profile-photo', UserProfilePhotoDeleteController::class);

    // Sessions
    Route::get('/sessions', UserSessionsShowController::class);
    Route::put('/other-browser-sessions', DeleteOtherBrowserSessionsController::class);

    // API Tokens
    Route::get('/api-tokens', ApiTokenIndexController::class);
    Route::post('/api-tokens', ApiTokenStoreController::class);
    Route::delete('/api-tokens/{token}', ApiTokenDeleteController::class);
});
