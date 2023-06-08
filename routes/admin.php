<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ApkController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OfficialMessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentGatewayDetailController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecificController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StickerController;
use App\Http\Controllers\SubcultureController;
use App\Http\Controllers\TermUseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::resources([
        'users'                   => UserController::class,
        'roles'                   => RoleController::class,
        'gifts'                   => GiftController::class,
        'stickers'                => StickerController::class,
        'pages'                   => PageController::class,
        'push-notifications'      => PushNotificationController::class,
        'coins'                   => CoinController::class,
        'official-messages'       => OfficialMessageController::class,
        'studios'                 => AgencyController::class,
        'models'                  => HostController::class,
        'payment-gateway-details' => PaymentGatewayDetailController::class,
        'category'                => CategoriesController::class,
        'term-of-use'             => TermUseController::class,
        'languages'               => LanguageController::class,
        'specifics'               => SpecificController::class,
        'subcultures'             => SubcultureController::class,
        'pricing'                 => PricingController::class,
        'countries'               => CountryController::class,
        'states'                  => StateController::class,
        'interests'               => InterestController::class
    ]);
    Route::get('update-user-status/{user}', [UserController::class, 'updateStatus']);

    Route::get('update-country-status/{country}', [CountryController::class, 'updateStatus']);

    Route::get('update-term-status/{user}', [TermUseController::class, 'updateStatus']);

    Route::post('fetch-users', [UserController::class, 'fetchUser']);
    Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::delete('feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
    Route::get('complaints', [HomeController::class, 'complaintList'])->name('complaints.index');
    Route::delete('complaint/{complaint}', [HomeController::class, 'deleteComplaint'])->name('complaints.destroy');
    Route::get('apk/create', [ApkController::class, 'create']);
    Route::post('apk', [ApkController::class, 'store'])->name('apk.store');
    Route::post('apk-upload', [ApkController::class, 'upload'])->name('apk.upload');

    Route::get('user/token/{user_id}', [UserController::class, 'userToken']);
    Route::post('update/token/{user_id}', [UserController::class, 'updateToken']);

});
