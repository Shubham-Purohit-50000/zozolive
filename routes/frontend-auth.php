<?php

use App\Http\Controllers\AgoraController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\ModelAuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebrtcStreamingController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::post('generate-username', 'generateUsername');
    Route::post('register-user', 'registerUser');
    Route::post('login-user', 'loginUser');
    Route::get('google/auth', 'redirectToGoogle');
    Route::get('facebook/auth', 'redirectToFacebook');
    Route::get('google/auth/callback', 'handleGoogleCallback');
    Route::get('facebook/auth/callback', 'handleFacebookCallback');
    Route::get('my-favorites', 'myFavourites');

    //    guest user signup and login routes
    Route::post('guest-signup', 'guestSignup');
    Route::post('guest-login', 'guestLogin');

    Route::middleware('auth')->group(function () {
        Route::get('afterlogin', 'userHome');
        Route::get('profile', 'userProfile');
        Route::post('update-user-profile', 'updateProfile');
        Route::post('logout', 'logoutUser');
    });
});

Route::controller(ModelAuthController::class)->prefix('model')->group(function () {
    Route::post('/signup', 'signup');
    Route::post('/login', 'login');
    Route::post('/verify-otp', 'verifyOtp');
    //    validate host signup step 2
    Route::post('/validate-sign-up-step-2', 'validateSignupStepTwo');
    Route::post('/request-approval', 'requestApproval');
});

Route::get('streams/{stream}/play', [StreamController::class, 'play'])->name('streams.play');
Route::resource('streams', StreamController::class);
Route::get('viewer', [StreamController::class, 'viewStream']);

//Route::middleware('auth')->group(function () {
Route::get('chat', [ChatController::class, 'index'])->middleware('auth');
//});
//});
Route::get('create-stream', [WebrtcStreamingController::class, 'createStream']);
Route::get('start-stream', [WebrtcStreamingController::class, 'startStream']);

Route::post('user/generate-token', [AgoraController::class, 'token']);
Route::middleware('auth')->group(function () {
    Route::post('model/generate-token', [AgoraController::class, 'generateHostToken']);
    Route::post('goals', [HostController::class, 'updateGoal']);
    Route::post('save-topic', [HostController::class, 'updateTopic']);
    Route::post('update-ticket-show-price', [HostController::class, 'updateTicketShowPrice']);
    Route::get('buy-token', [FrontendController::class, 'buyToken']);
});
// Route::get('stripe', [PaymentController::class, 'stripePage']);
// Route::post('stripe', [PaymentController::class, 'stripePage'])->name('stripe.post');
// Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'createCheckoutSession'])->name('checkout');
Route::get('/checkout/success', [CheckoutController::class, 'handleSuccess'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'handleCancel'])->name('checkout.cancel');
Route::post('/user/status/{uuid}', [UserController::class, 'updateUserStatus']);
Route::post('/upload/{uuid}/live-image', [UserController::class, 'storeLiveImage']);
Route::view('sample-stream', 'sample-stream');
