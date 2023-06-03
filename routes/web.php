<?php

use App\Http\Controllers\CallHistoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebrtcStreamingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin'       => Route::has('login'),
//        'canRegister'    => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion'     => PHP_VERSION,
//    ]);
//});

// Route::get('/dashboard', function () {
//     dd(isRole('super-admin'));
//     if (isRole('super-admin')) {
//         return Inertia::render('Dashboard');
//     }else{
//         return redirect('/');
//     }
// })->middleware(['auth', 'role:super-admin'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:super-admin'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::view('ask-permission', 'frontend.ask-permission');
Route::get('broadcast-center', [FrontendController::class, 'broadcastCenter'])->name('frontend.broadcast')->middleware('front.auth');

Route::get('allow-permission', [FrontendController::class, 'allowPermission'])->name('allow-permission');

//Route::middleware('ask.permission')->group(function () {
Route::get('/', [FrontendController::class, 'index']);
Route::view('/afterlogin', 'frontend.afterlogin');
Route::view('/profile-modal', 'frontend.profileModal');
Route::view('/setting', 'frontend.setting');
Route::view('/tokens-history', 'frontend.tokensHistory');

// call history
Route::get('/call-history', [CallHistoryController::class, 'callHistory']);
Route::view('/payment-settings', 'frontend.PaymentSettings');
Route::view('/studio-modal', 'frontend.studioModal');
Route::view('/modal-control', 'frontend.modalControl');
Route::view('/contact-us', 'frontend.contactUS');
Route::view('/faq', 'frontend.faq');

Route::get('/buy-token', [FrontendController::class, 'buyToken']);

//    Route::view('/become-a-model', 'frontend.become_model');

Route::get('/stream/{username}', [FrontendController::class, 'hostDetail'])->name('watch-stream');

Route::get('become-a-model', [FrontendController::class, 'becomeModel']);
Route::post('get-states', [FrontendController::class, 'getState']);

//});
Route::get('/terms-of-use', [FrontendController::class, 'termOfUse']);

Route::get('/privacy-policy', [FrontendController::class, 'privacyPolice']);
Route::get('/cookies-policy', [FrontendController::class, 'cookiesPolicy']);
Route::get('/dmca-policy', [FrontendController::class, 'dmcaPolicy']);
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy']);

Route::get('/about-us', [FrontendController::class, 'about_us']);
// });

Route::get('/streaming', [WebrtcStreamingController::class, 'index']);
Route::match(['get', 'post'], 'live-stream/start', [WebrtcStreamingController::class, 'streamStart'])->name('streaming.start');
Route::get('/streaming/{streamId}', [WebrtcStreamingController::class, 'consumer']);
Route::post('/stream-offer', [WebrtcStreamingController::class, 'makeStreamOffer']);
Route::post('/stream-answer', [WebrtcStreamingController::class, 'makeStreamAnswer']);

// Auth::routes();
Route::get('home', [HomeController::class, 'index'])->middleware('role:super-admin');
require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';

// frontend auth routes
require __DIR__ . '/frontend-auth.php';

// Route::get('/agora-chat', 'App\Http\Controllers\AgoraVideoController@index');
// Route::post('/agora/token', 'App\Http\Controllers\AgoraVideoController@token');
// Route::post('/agora/call-user', 'App\Http\Controllers\AgoraVideoController@callUser');

// Route::get('agora-video', [HomeController::class, 'agoraVideo'])->name('agora.video');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/agora-chat', 'App\Http\Controllers\AgoraVideoController@index');
    Route::post('/agora/token', 'App\Http\Controllers\AgoraVideoController@token');
    Route::post('/agora/call-user', 'App\Http\Controllers\AgoraVideoController@callUser');
    Route::post('/agora/decline-call', 'App\Http\Controllers\AgoraVideoController@declineCall');
    Route::post('/agora/accept-call', 'App\Http\Controllers\AgoraVideoController@acceptCall');
    Route::post('/agora/end-call', 'App\Http\Controllers\AgoraVideoController@endCall');
    Route::post('/agora/deduct-token', 'App\Http\Controllers\AgoraVideoController@deductToken');

    Route::get('/video-call/{channel}', 'App\Http\Controllers\AgoraVideoController@videoCall');

    Route::get('/call-logs', 'App\Http\Controllers\TokenHistoryController@index');
});

//Favourites
Route::post('/manage-favourite', 'App\Http\Controllers\FrontendController@manageFavourite');

Route::post('agorabroadcasting/auth', function () {
    return auth()->user();
});

//---------Shubham Route------------------------
Route::post('uplaod/profile/image', [FrontendController::class, 'updateProfileImage']);
Route::get('user_level/{token}', [FrontendController::class, 'userLevel']); 
// Token deduction
Route::post('user/{token}', [FrontendController::class, 'setUserToken']); 
// Put screen capture into database 

