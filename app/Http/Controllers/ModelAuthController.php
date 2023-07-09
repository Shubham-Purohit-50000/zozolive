<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelSignupRequest;
use App\Http\Requests\ModelSignupStepTwoRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use App\Services\SignupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\SendOtpMailTrait;

class ModelAuthController extends Controller
{
    /**
     * @param SignupRequest $request
     * @return JsonResponse
     */
    public function signup(SignupRequest $request)
    {
        $password = $request->password ?? generatePassword();
        $otp = generateOtp();
        $attributes = [
            'otp'            => $otp,
            'otp_expired_at' => now()->addMinutes(10),
            'password'       => bcrypt($password),
            'plain_password' => $password,
            'is_active'      => 0
        ];

        $user = User::create(array_merge($request->validatedAttribute(), $attributes));
        $roleId = (new SignupService())->getUserRoleId('model');
        $user->attachRole($roleId);
               $to=$request->email;
               $subject='Your OTP for signup';
        SendOtpMailTrait::sendOtpMail(['to'=>$to,'otp'=>$otp,'subject'=>$subject]);
        return response()->json([
            'url' => url('/')
        ]);
    }

    public function login(Request $request)
    {
        $login_with = 'username';
        if (str_contains($request->username, '@')) {
            $login_with = 'email';
        }
        $validator = $request->validate([
            'username' => 'required|exists:users,' . $login_with,
            'password' => 'required'
        ]);
        $user = User::where("$login_with", $request->username)->first();
        $creds = [
            "$login_with" => $validator['username'],
            'password'    => $validator['password']
        ];
        if (auth()->attempt($creds) && $user->hasRole('model')) {
            auth()->logoutOtherDevices($validator['password']);
            if ($user->is_active == 1 && $user->email_verified_at != null) {
                return response()->json([
                    'url' => url('/'),
                    'msg' => 'success'
                ]);
            } elseif ($user->model) {
                auth()->logout();
                return response()->json([
                    'msg' => 'Your profile is under review, please try again after 24 hours or contact to admin.'
                ], 400);
            } else {
                // $to=$request->email;
                // $subject='Your OTP for signup';
                // SendOtpMailTrait::sendOtpMail(['to'=>$to,'otp'=>$otp,'subject'=>$subject]);
                $user->update([
                    'otp'            => generateOtp(),
                    'otp_expired_at' => now()->addMinutes(10),
                ]);
                auth()->logout();
                return response()->json([
                    'msg' => 'Your profile is not verified, please verify your profile to login.'
                ], 403);
            }
        } else {
            return response()->json([
                'msg' => 'Authentication failed.'
            ], 401);
        }
    }

    public function verifyOtp(Request $request)
    {
        $login_with = 'username';
        if (str_contains($request->username, '@')) {
            $login_with = 'email';
        }
        $request->validate([
            'otp'      => 'required|numeric|digits:6',
            'username' => 'required|exists:users,' . $login_with
        ]);
        $user = DB::table('users')
            ->where($login_with, $request->username)
            ->first();
        if ($user) {
            if ($user->otp == $request->otp && $user->otp_expired_at <= now()->addMinutes(10)) {
                return response()->json([
                    'msg' => 'OTP verified successfully',
                ]);
            } else {
                return response()->json([
                    'msg' => 'OTP is wrong or expired, please try again'
                ], 401);
            }
        } else {
            return response()->json([
                'msg' => 'Something went wrong, please try again'
            ], 401);
        }
    }

    public function validateSignupStepTwo(ModelSignupStepTwoRequest $request)
    {
        $request->validated();
        return response()->json();
    }

    public function requestApproval(ModelSignupRequest $request)
    {
        $validated = $request->validated();
        //        dd($request->all());
        $service = new SignupService();
        // create model user
        $user = $service->createModelUser($validated);
        // create model
        $service->createModel($user, $validated);
        return response()->json([
            'msg' => 'Your profile is under review, please try again after 24 hours or contact to admin.'
        ]);
    }
}
