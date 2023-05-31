<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Classes\AgoraDynamicKey\RtcTokenBuilder2;
use App\Events\MakeAgoraCall;
use App\Models\User;

class AgoraController extends Controller
{
    public function index(Request $request)
    {
        // fetch all users apart from the authenticated user
        $users = User::where('uuid', '<>', auth()->id())->get();
        return view('agora-chat', ['users' => $users]);
    }

    public function token(Request $request)
    {
        $appId = config('services.agora.app_id');
        $appCertificate = config('services.agora.app_certificate');

        $uid = rand(11111, 99999);
        $expireTimeInSeconds = 3600;
        $privilegeExpirationInSeconds = 3600;
        $channelName = $request->channelName;

        // $role = RtcTokenBuilder::RolePublisher;
        $token = RtcTokenBuilder2::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, RtcTokenBuilder2::ROLE_SUBSCRIBER, $expireTimeInSeconds, $privilegeExpirationInSeconds);

        // $token = RtcTokenBuilder::buildTokenWithUserAccount($appId, $appCertificate, $channelName, $user, $role, $expireTimeInSeconds);
        return [
            'token' => $token,
            'uid'   => $uid
        ];
    }

    public function generateHostToken(Request $request)
    {
        $appId = config('services.agora.app_id');
        $appCertificate = config('services.agora.app_certificate');

        // $user = 'techy ms';
        $uid = rand(11111, 99999);
        $expireTimeInSeconds = 3600;
        $privilegeExpirationInSeconds = 3600;
        $channelName = $request->channelName;

        // $role = RtcTokenBuilder::RolePublisher;
        $token = RtcTokenBuilder2::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, RtcTokenBuilder2::ROLE_PUBLISHER, $expireTimeInSeconds, $privilegeExpirationInSeconds);

        // $token = RtcTokenBuilder::buildTokenWithUserAccount($appId, $appCertificate, $channelName, $user, $role, $expireTimeInSeconds);
        return [
            'token' => $token,
            'uid'   => $uid
        ];

        // return $this->generateToken($request, );
    }

    public function generateToken(Request $request, $role)
    {
        $appID = config('services.agora.app_id');
        $appCertificate = config('services.agora.app_certificate');
        $channelName = $request->channelName;
        $uid = 1;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;
        $privilegeExpirationInSeconds = 3600;

        $token = RtcTokenBuilder2::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, RtcTokenBuilder2::ROLE_PUBLISHER, $expireTimeInSeconds, $privilegeExpirationInSeconds);

        // $token = RtcTokenBuilder2::buildTokenWithUid($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);
        return $token;
    }

    public function callUser(Request $request)
    {
        $data['userToCall'] = $request->user_to_call;
        $data['channelName'] = $request->channel_name;
        $data['from'] = auth()->id();

        broadcast(new MakeAgoraCall($data))->toOthers();
    }
}
