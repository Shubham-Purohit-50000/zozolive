<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Host;
use App\Models\Language;
use App\Models\TicketShow;
use App\Models\User;
use Illuminate\Support\Str;

class ChatController extends Controller
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
        $appID = '08eda6ec48a049d4b4c19ed30ffebc31';
        $appCertificate = 'a371a4837cff4250aa5192a7ac9e0fb3';
        $channelName = Str::random(12);
        $isCustomer = isRole('user');
        return inertia('Chat/Index', [
            'users'         => User::withoutEvents(function () {
                $role = isRole('user') ? 'model' : 'user';
                return User::whereRelation('roles', 'name', $role)->get()
                ->map(function ($item) {
                    $ticketShow = null;
                    $host = Host::where('user_id', $item->uuid)->first();
                    if(!empty($host)) {
                        $ticketShow = TicketShow::where('host_id', $host->user_id)->first();
                    }
                  
                    $item->avatar = $item->avatar ? storageUrl($item->avatar) : '';
                    $item->send_at = null;
                    $item->private_call =  $ticketShow ? $ticketShow->token : null;
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
