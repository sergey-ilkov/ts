<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\SecretController;
use App\Http\Controllers\Frontend\PrivacyController;
use App\Http\Controllers\Frontend\AuthUserController;
use App\Http\Controllers\Frontend\FeedbackController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\TermController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
// ? feedback throtle
Route::middleware(['throttle:feedback'])->group(function () {
    Route::post('/feedback', [FeedbackController::class, 'message'])->name('feedback.post');
});

Route::get('/secret', function () {
    abort(404);
});

Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/terms', [TermController::class, 'index'])->name('terms');

// ? secret throttle
Route::middleware(['throttle:secret'])->group(function () {
    Route::post('/secret', [SecretController::class, 'store'])->name('secret.store');
    // Route::get('/secret/{key}', [SecretController::class, 'show'])->name('secret.show');
    // Route::post('/secret/{key}', [SecretController::class, 'showDelete'])->name('secret.show.delete');
});


Route::get('/secret/{key}', [SecretController::class, 'show'])->name('secret.show');
Route::post('/secret/{key}', [SecretController::class, 'showDelete'])->name('secret.show.delete');





Route::get('/password-reset/{token}', [ForgotPasswordController::class, 'indexPasswordReset'])->name('password.reset.index');
Route::get('/forgot-password', function () {
    abort(404);
});

Route::middleware(['throttle:user-auth'])->group(function () {
    Route::post('/register', [AuthUserController::class, 'register'])->name('user.register');
    Route::post('/login', [AuthUserController::class, 'login'])->name('user.login');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendLinkPasswordReset'])->name('password.forgot.post');
    Route::post('/password-reset/{token}', [ForgotPasswordController::class, 'submitPasswordReset'])->name('password.reset.post');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/logout', [AuthUserController::class, 'logout'])->name('user.logout');
});



// ? test route
// Route::get('/test', [TestController::class, 'index'])->name('test');