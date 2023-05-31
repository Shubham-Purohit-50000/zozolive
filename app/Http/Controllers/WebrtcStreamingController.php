<?php

namespace App\Http\Controllers;

use App\Events\StreamAnswer;
use App\Events\StreamEvent;
use App\Models\Country;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WebrtcStreamingController extends Controller
{
    public function __construct()
    {
        $countries = Country::withoutEvents(function () {
            return Country::where('is_active', 1)->get()
                ->map(function ($item) {
                    $item->icon = 'https://ipdata.co/flags/' . strtolower($item->code) . '.png';
                    return $item;
                });
        });
        $languages = Language::withoutEvents(function () {
            return Language::all();
        });
        view()->share('countries', $countries);
        view()->share('languages', $languages);
    }

    public function index()
    {
        return view('stream');

//        return inertia('Broadcaster', [
//            'type'           => 'broadcaster',
//            'auth_user_id'   => Auth::id(),
//            'env'            => env('APP_ENV'),
//            'turn_url'       => env('TURN_SERVER_URL'),
//            'turn_username'  => env('TURN_SERVER_USERNAME'),
//            'turn_credential'=> env('TURN_SERVER_CREDENTIAL')
//        ]);
    }

    public function consumer(Request $request, $streamId)
    {
        return view('video-broadcast', ['type' => 'consumer', 'streamId' => $streamId, 'id' => Auth::id()]);
    }

    public function makeStreamOffer(Request $request)
    {
        $data['broadcaster'] = $request->broadcaster;
        $data['receiver'] = $request->receiver;
        $data['offer'] = $request->offer;

        event(new StreamEvent($data));
    }

    public function makeStreamAnswer(Request $request)
    {
        $data['broadcaster'] = $request->broadcaster;
        $data['answer'] = $request->answer;
        event(new StreamAnswer($data));
    }

    public function createStream()
    {
        $token = env('MUX_TOKEN');
        $secret = env('MUX_SECRET');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.mux.com/video/v1/live-streams');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $token . ':' . $secret ?? '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{ "playback_policy": "public", "new_asset_settings": { "playback_policy": "public" } }');

        $response = curl_exec($ch);
        return $response;
        curl_close($ch);
    }

    public function createPlayback()
    {
        $token = env('MUX_TOKEN');
        $secret = env('MUX_SECRET');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.mux.com/video/v1/live-streams/KCjUs5fwKTw95NE01r99yGv4EFv014Bx1LQTJR01MUvrOM/playback-ids');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $token ?? '' . ':' . $secret ?? '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{ "policy": "public" }');

        $response = curl_exec($ch);

        curl_close($ch);
    }

    public function startStream()
    {
        return inertia('Stream/Index');
    }

    public function stream()
    {
        return view('stream');
    }

    public function streamStart()
    {
        $appID = config('services.agora.app_id');
        $appCertificate = config('services.agora.app_certificate');
        $channelName = Str::random(12);
        $isCustomer = isRole('user');

        $test_user = User::get();

        return inertia('Stream/Index', [
            'users' => User::withoutEvents(function () {
                $role = 'user';
                return User::whereRelation('roles', 'name', $role)->get()
                ->map(function ($item) {
                    $item->avatar = $item->avatar ? storageUrl($item->avatar) : '';
                    $item->send_at = null;
                    return $item;
                });
            }),
            'agora_id'      => $appID,
            'agoraChannel'  => $channelName,
            'authuserid'    => auth()->id(),
            'appCertificate'=> $appCertificate,
            'isCustomer'    => $isCustomer
        ]);
    }
}
