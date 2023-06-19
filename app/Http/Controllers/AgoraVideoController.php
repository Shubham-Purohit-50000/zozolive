<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CallLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MakeAgoraCall;
use App\Events\DeclineCall;
use App\Events\AcceptCall;
use App\Events\EndCall;
use Inertia\Inertia;
use App\Models\TokenHistory;
use App\Models\HostPricing;
use App\Classes\AgoraDynamicKey\RtcTokenBuilder;


class AgoraVideoController extends Controller
{
    public function index(Request $request)
    {

        $users = User::where('uuid', '<>', Auth::id())->get();
        $appID = '08eda6ec48a049d4b4c19ed30ffebc31';
        $appCertificate = 'a371a4837cff4250aa5192a7ac9e0fb3';
        $uid = (int) mt_rand(1000000000, 9999999999);
        return Inertia('Agora', ['allusers'=>$users, 'agora_id'=>$appID, 'authuseruid'=>$uid, 'authuserid'=>Auth::id(), 'appCertificate'=>$appCertificate]);
    }

    public function token(Request $request)
    {
        $appID = '08eda6ec48a049d4b4c19ed30ffebc31';
        $appCertificate = 'a371a4837cff4250aa5192a7ac9e0fb3';
        $channelName = $request->channelName;
        $user = Auth::user()->name;
        if (isRole('user')) {
            $role = RtcTokenBuilder::RolePublisher;
        } else {
            $role = RtcTokenBuilder::RoleAttendee;
        }
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $uid = $request->authuseruid;
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
        return $token;
    }

    public function callUser(Request $request)
    {
        $data['userToCall'] = $request->user_to_call;
        $data['channelName'] = $request->channel_name;
        $data['from'] = Auth::id();
        $data['from_user'] = auth()->user();

        $createLog = new CallLog();
        $createLog->host_id = $request->user_to_call;
        $createLog->user_id = Auth::id();
        $createLog->call_status = 3;
        $createLog->channel_id = $request->channel_name;
        $createLog->save();

        broadcast(new MakeAgoraCall($data))->toOthers();
    }

    public function declineCall(Request $request)
    {
        $data['channelName'] = $request->agoraChannel;
        $checkLog = CallLog::where(['host_id'=>Auth::id(), 'channel_id'=>$request->agoraChannel, 'call_status'=>3])->update(['call_status'=>4]);
        broadcast(new DeclineCall($data))->toOthers();
    }

    public function acceptCall(Request $request)
    {
        $data['channelName'] = $request->agoraChannel;
        $checkLog = CallLog::where(['host_id'=>Auth::id(), 'channel_id'=>$request->agoraChannel, 'call_status'=>3])->update(['call_status'=>1]);
        broadcast(new AcceptCall($data))->toOthers();
    }

    public function endCall(Request $request)
    {
        $current_time = now();
        $data['channelName'] = $request->agoraChannel;
        $log = CallLog::where([
            'user_id'    => Auth::id(),
            'channel_id' => $request->agoraChannel,
            'call_status'=> 5
        ])->first();
        $history = TokenHistory::where('type_id', $log->uuid)->where('type', 1)->first();

        $seconds = (int)$request->duration;
        $secs = $seconds % 60;
        $hrs = $seconds / 60;
        $mins = $hrs % 60;
        $hrs = $hrs / 60;

        $duration = (int)$hrs . ':' . (int)$mins . ':' . (int)$secs;
        
        $log->update([
            'call_status'    => 2,
            'end_time'       => $current_time,
            'duration'       => $duration,
            'call_coin'      => $history->type_coin
        ]);
        $history->duration = $duration;
        $history->save();
        $user = User::where('uuid', $log->host_id)->first();
        $oldToken = $user->token ?? 0;
        $user->update([
            'token' => ($oldToken + $log->call_coin)
        ]);
        broadcast(new EndCall($data))->toOthers();
    }

    public function videoCall(Request $request, $channel)
    {
        if (isRole('user')) {
            if (Auth::user()->token < 10) {
                return back()->with('error', 'Insuficient Account Balance');
            }
        }
        $checkLog = CallLog::where(['channel_id'=>$channel])->where('call_status', '!=', 2)->latest()->first();
        if ($checkLog) {
            CallLog::where(['channel_id'=>$channel, 'call_status'=>1])->update(['call_status'=>5, 'start_time'=>date('Y-m-d H:i:s')]);
            $appID = config('services.agora.app_id');
            $appCertificate = config('services.agora.app_certificate');

            $uid = (int) mt_rand(10000000, 99999999);

            $agoraToken = self::generateToken($channel, $uid);

            $check = TokenHistory::where('type_id', $checkLog->uuid)->where('type', 1)->first();

            if (!$check) {
                $tknhistory = new TokenHistory();
                $tknhistory->type_id = $checkLog->uuid;
                $tknhistory->type = 1;
                // $tknhistory->duration = $duration;
                $tknhistory->type_coin = 0;
                $tknhistory->save();
                $hisid = $tknhistory->id;
            } else {
                $hisid = $check->id;
            }
            $isCustomer = isRole('user');
            Inertia::setRootView('videocall');
            return Inertia('VideoCall', ['channel'=>$channel, 'authuid'=>(int)$uid, 'agora_id'=>$appID, 'appCertificate'=>$appCertificate, 'agoraToken'=>$agoraToken, 'history_id'=>$hisid, 'isCustomer'=>$isCustomer]);
        } else {
            return back()->with('error', 'Invalid Channel Request');
        }
    }

    public function generateToken($channelName, $uid)
    { 
        $appID = '08eda6ec48a049d4b4c19ed30ffebc31';
        $appCertificate = 'a371a4837cff4250aa5192a7ac9e0fb3';
        $channelName = $channelName;
        $user = Auth::user()->name;
        if (isRole('user')) {
            $role = RtcTokenBuilder::RolePublisher;
        } else {
            $role = RtcTokenBuilder::RoleAttendee;
        }
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
        return $token;
    }

    public function deductToken(Request $request)
    {
        
        $call_id = $request->history_id;
        $tknhistory = TokenHistory::find($call_id);
        $coin = 10;

        $getHostDetail = User::where('uuid', $tknhistory->host_id)->with('model')->first();
        if ($getHostDetail) {
            $pricingDetail = HostPricing::where('user_id', $tknhistory->host_id)->first();
            $coin = $pricingDetail?->token;
            $getHostDetail->token = ($getHostDetail->token + $coin);
            $getHostDetail->save();
        }

        $seconds = (int)$request->duration;
        $secs = $seconds % 60;
        $hrs = $seconds / 60;
        $mins = $hrs % 60;
        $hrs = $hrs / 60;

        $duration = (int)$hrs . ':' . (int)$mins . ':' . (int)$secs;

        $remainingToken = (Auth::user()->token - $coin);
        Auth::user()->update(['token' => $remainingToken]);
        $tknhistory->duration = $duration;
        $tknhistory->type_coin = ((int)$coin + (int)$tknhistory->type_coin);
        $tknhistory->save();

        return $remainingToken;
    }
}
