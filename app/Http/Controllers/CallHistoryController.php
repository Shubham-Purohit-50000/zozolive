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
use App\Models\User;
use App\Models\HostPricing;
use Illuminate\Support\Facades\DB as FacadesDB;
use stdClass;

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
    public function callHistory(Request $req)
    {
        $date = now()->subDays(6)->format('Y-m-d');
        // $start = $date . ' 00:00:00';
        // $end = now()->format('Y-m-d') .' 23:59:00';
        // if ($request->query('daterange')) {
        //     $daterange = explode('-', $request->query('daterange'));
        //     $start_date = trim($daterange[0]);
        //     $start = date('Y-m-d', strtotime(trim($daterange[0]))) .' 00:00:00';
        //     $end_date = trim($daterange[1]);
        //     $end = date('Y-m-d', strtotime(trim($daterange[1]))).' 23:59:00';
        // }
        // $key = isRole('user') ? 'user_id' : 'host_id';

        $role = isRole('user') ? 'user' : 'host';
        return inertia('Token/Index', [
            'role'  => $role,
            'user'  => auth()->user(),
            'date'  => $date,
        ]);
    }

    public function privateChatHistory(Request $req, User $user)
    {

        $token_spents = TokenSpent::select('host_id', DB::raw('SUM(token) as total_token'))
        ->where('user_id', $user->uuid)
        ->where('type', 'private_chat')
        ->groupBy('host_id');

        $formet_date = null;

        if($req->has('date')) {
            $formet_date = Carbon::parse($req->date)->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        } else {
            $formet_date = Carbon::today()->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        }
        $token_spents = $token_spents->latest()->get();

        $host_array = [];
        foreach ($token_spents as $data) {
            $host = User::where('uuid', $data['host_id'])->first();
            $object = new stdClass();
            $object->host_name = $host->name;
            $object->total_token = $data['total_token'];
            $object->type = 'Private Chat';
            //$object->created_at = Carbon::parse($data['created_at'])->format('Y-m-d');
            $object->created_at = $formet_date;
            $object->host_id = $data['host_id'];
            $object->user_id = $data['user_id'];
            array_push($host_array, $object);
        }

        return response()->json([
            'token_spent'=> $host_array,
        ]);

    }

    public function privateCallHistory(Request $req, User $user)
    {
        $token_spents = CallLog::where('user_id', $user->uuid);

        $formet_date = null;

        if($req->has('date')) {
            $formet_date = Carbon::parse($req->date)->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        } else {
            $formet_date = Carbon::today()->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        }
        $token_spents = $token_spents->latest()->get();

        $host_array = [];
        foreach ($token_spents as $data) {
            $host = User::where('uuid', $data['host_id'])->first();
            $object = new stdClass();
            $object->host_name = $host->name;
            $object->token = $data['call_coin'];
            $object->type = 'Private Call';
            $object->created_at = Carbon::parse($data['created_at'])->format('Y-m-d h:i:s a');
            $object->call_duration = $data['duration'];
            array_push($host_array, $object);
        }

        return response()->json([
            'token_spent'=> $host_array,
        ]);
    }

    public function hostPrivateCallHistory(Request $req, User $user)
    {
        $token_spents = CallLog::where('host_id', $user->uuid);

        $formet_date = null;

        if($req->has('date')) {
            $formet_date = Carbon::parse($req->date)->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        } else {
            $formet_date = Carbon::today()->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        }
        $token_spents = $token_spents->latest()->get();

        $host_array = [];
        foreach ($token_spents as $data) {
            $host = User::where('uuid', $data['user_id'])->first();
            $object = new stdClass();
            $object->host_name = $host->name;
            $object->token = $data['call_coin'];
            $object->type = 'Private Call';
            $object->created_at = Carbon::parse($data['created_at'])->format('Y-m-d h:i:s a');
            $object->call_duration = $data['duration'];
            array_push($host_array, $object);
        }

        return response()->json([
            'token_spent'=> $host_array,
        ]);
    }

    public function sendTipHistory(Request $req, User $user)
    {

        $token_spents = TokenSpent::where('user_id', $user->uuid)->where('type', 'spend_tip');

        if($req->has('date')) {
            $token_spents->whereDate('created_at', $req->date);
        } else {
            $token_spents->whereDate('created_at', Carbon::today());
        }
        $token_spents = $token_spents->latest()->get();

        $host_array = [];
        foreach ($token_spents as $data) {
            $host = User::where('uuid', $data['host_id'])->first();
            $object = new stdClass();
            $object->host_name = $host->name;
            $object->token = $data['token'];
            $object->type = $data['type'];
            $object->created_at = Carbon::parse($data['created_at'])->format('Y-m-d');
            $object->host_id = $data['host_id'];
            $object->user_id = $data['user_id'];
            array_push($host_array, $object);
        }

        return response()->json([
            'token_spent'=> $host_array,
        ]);

    }

    public function userTransactionHistory(Request $req, User $user)
    {
        $recharge = Recharge::where('user_id', $user->uuid)->latest()->get();
        return response()->json([
            'recharge'=> $recharge,
        ]);

    }

    //----------------- call related to host start here

    public function hostPrivateChatHistory(Request $req, User $user)
    {

        $token_spents = TokenSpent::select('user_id', DB::raw('SUM(token) as total_token'))
        ->where('host_id', $user->uuid)
        ->where('type', 'private_chat')
        ->groupBy('user_id');

        $formet_date = null;

        if($req->has('date')) {
            $formet_date = Carbon::parse($req->date)->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        } else {
            $formet_date = Carbon::today()->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        }
        $token_spents = $token_spents->latest()->get();

        $user_array = [];
        foreach ($token_spents as $data) {
            $user = User::where('uuid', $data['user_id'])->first();
            $object = new stdClass();
            $object->user_name = $user->name;
            $object->total_token = $data['total_token'];
            $object->type = 'Private Chat';
            //$object->created_at = Carbon::parse($data['created_at'])->format('Y-m-d');
            $object->created_at = $formet_date;
            $object->host_id = $req->host_id;
            $object->user_id = $data['user_id'];
            array_push($user_array, $object);
        }

        return response()->json([
            'token_spent'=> $user_array,
        ]);

    }

    public function hostTokenHistory(Request $req, User $user)
    {
        $token_spents = TokenSpent::where('host_id', $user->uuid)->where('type', '!=', 'private_chat');

        $formet_date = null;

        if($req->has('date')) {
            $formet_date = Carbon::parse($req->date)->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        } else {
            $formet_date = Carbon::today()->format('Y-m-d');
            $token_spents->whereDate('created_at', $formet_date);
        }

        $token_spents = $token_spents->latest()->get();

        $user_array = [];
        foreach ($token_spents as $data) {
            $user = User::where('uuid', $data['user_id'])->first();
            $object = new stdClass();
            $object->user_name = $user->name;
            $object->token = $data['token'];
            $object->type = $data['type'];
            $object->created_at = Carbon::parse($data['created_at'])->format('d M h:i a');
            $object->host_id = $req->host_id;
            $object->user_id = $data['user_id'];
            array_push($user_array, $object);
        }

        return response()->json([
            'token_spent'=> $user_array,
        ]);

    }

    public function incomeReport(Request $req, User $user)
    {

        $income_report = array();

        $today_date = Carbon::today()->format('Y-m-d');
        $today_income = TokenSpent::where('host_id', $user->uuid)->whereDate('created_at', $today_date)->sum('token');
        $income_report['today_income'] = $today_income;

        $current_week_income = TokenSpent::where('host_id', $user->uuid)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('token');
        $income_report['current_week_income'] = $current_week_income;

        $check = Carbon::now()->startOfMonth() ." | ". Carbon::now()->endOfMonth();

        $last_week_income = TokenSpent::where('host_id', $user->uuid)->whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->sum('token');
        $income_report['last_week_income'] = $last_week_income;

        $current_month_income = TokenSpent::where('host_id', $user->uuid)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('token');
        $income_report['current_month_income'] = $current_month_income;

        return response()->json([
            'income_report'=> $income_report,
        ]);
    }

    public function getPrivateCallToken(Request $request){
        $private_call = HostPricing::where('user_id', $request->host_id)->first();
        return response()->json($private_call->token);
    }

    public function updatePrivateCallToken(Request $request){
        $private_call = HostPricing::where('user_id', $request->host_id)->first();
        $private_call->token = $request->token;
        $private_call->update();
        return response()->json([
            'message'=>'token update successfully',
            'status'=>true,
        ]);
    }

}
