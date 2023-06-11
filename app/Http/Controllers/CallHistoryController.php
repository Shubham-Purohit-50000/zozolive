<?php

namespace App\Http\Controllers;

use App\Models\CallLog;
use App\Models\Country;
use App\Models\Language;
use App\Models\TokenSpent;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Recharge;

class CallHistoryController extends Controller
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
    public function callHistory(Request $request)
    {
        $date = now()->subDays(6)->format('Y-m-d');
        $start = $date . ' 00:00:00';
        $end = now()->format('Y-m-d') .' 23:59:00';
        if ($request->query('daterange')) {
            $daterange = explode('-', $request->query('daterange'));
            $start_date = trim($daterange[0]);
            $start = date('Y-m-d', strtotime(trim($daterange[0]))) .' 00:00:00';
            $end_date = trim($daterange[1]);
            $end = date('Y-m-d', strtotime(trim($daterange[1]))).' 23:59:00';
        }
        $key = isRole('user') ? 'user_id' : 'host_id';
        return view('frontend.call-history', [
            'calls' => CallLog::withoutEvents(function () use ($start, $end, $key) {
                return CallLog::where($key, auth()->id())
                ->whereBetween('start_time', [$start, $end])
                ->with('user', 'host')
                ->orderByDesc('start_time')
                ->get();
            }),
            'date'  => $date,
            'start' => $start_date ?? '',
            'end'   => $end_date ?? ''
        ]);
    }

    public function privateChatHistory(Request $req){

        $token_spents = TokenSpent::select('host_id', DB::raw('SUM(token) as total_token'))
        ->where('user_id', $req->user_id)
        ->where('type', 'private_chat')
        ->groupBy('host_id');

        if($req->has('date')){
            $token_spents->whereDate('created_at', $req->date);
        }else{
            $token_spents->whereDate('created_at', Carbon::today());
        }
        $token_spents = $token_spents->latest()->get();
        return response()->json($token_spents);

    }

    public function sendTipHistory(Request $req){

        $token_spents = TokenSpent::where('user_id', $req->user_id)->where('type', 'spend_tip');

        if($req->has('date')){
            $token_spents->whereDate('created_at', $req->date);
        }else{
            $token_spents->whereDate('created_at', Carbon::today());
        }
        $token_spents = $token_spents->latest()->get();
        return response()->json($token_spents);

    }

    public function userTransactionHistory(Request $req){
        $recharge = Recharge::where('user_id', $req->user_id)->latest()->get();
        return response()->json($recharge);
    }

}
