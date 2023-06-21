<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\Country;
use App\Models\Page;
use App\Models\Pricing;
use App\Models\State;
use App\Models\TermUse;
use App\Models\User;
use App\Models\Host;
use App\Models\Coin;
use App\Models\HostFavourite;
use App\Models\Language;
use App\Services\SignupService;
use Exception;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Response;
use Inertia\ResponseFactory;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\TokenSpent;

class FrontendController extends Controller
{
    private SignupService $service;

    public function __construct()
    {
        $this->service = new SignupService();
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

    public function index(Request $request)
    {
        // if (session()->get('is_18')) {
        $search = $request->search ?? null;
        $userIds = User::withoutEvents(function () use ($search) {
            return User::whereRelation('roles', 'name', 'model')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', "%$search%");
            })->where('is_active', 1)->pluck('uuid')->toArray();
        });

        $languageId = null;
        if($request->language) {
            $languageId = Language::withoutEvents(function () use ($request) {
                return Language::where('name', $request->language)
                    ->value('uuid');
            });
        }
        $countryId = null;
        if($request->country) {
            $countryId = Country::withoutEvents(function () use ($request) {
                return Country::where('code', $request->country)
                    ->value('id');
            });
        }
        $hosts = Host::withoutEvents(function () use ($request, $userIds, $languageId, $countryId) {
            return Host::whereIn('user_id', $userIds)
                ->when($request->language, function ($qry) use ($languageId) {
                    return $qry->where('language_id', $languageId);
                })
                ->when($request->country, function ($qry) use ($countryId) {
                    return $qry->where('country_id', $countryId);
                })
                ->with('user', 'country')
                ->get();
        })
        ->map(function ($item) {
            $item->user->avatar = $item->user?->avatar ? storageUrl($item->user->avatar) : '';
            if ($item->country) {
                $item->country->code = $item?->country?->code ? strtolower($item->country->code) : '';
                $item->cflag = 'https://ipdata.co/flags/' . strtolower($item->country->code) . '.png';
            }
            return $item;
        });
        return inertia('Index', [
            'hosts'     => $hosts ?? [],
        ]);
        // } else {
        //     return view('frontend.ask-permission');
        // }
    }

    public function hostDetail(Request $request, $username)
    {
        $hosts = Host::inRandomOrder()->with('user', 'specific')->whereHas('user', function ($query) use ($username) {
            return $query->where('username', '!=', $username)->where('is_active', 1);
        })->get()
        ->map(function ($item) {
            $item->user->avatar = $item->user?->avatar ? storageUrl($item->user->avatar) : '';
            return $item;
        });

        $hostDetail = Host::with('user', 'ticketShow', 'language:uuid,name', 'specific:uuid,name', 'subculture:uuid,name', 'country:id,name', 'state:id,name')
        ->whereHas('user', function ($query) use ($username) {
            return $query->where('username', $username)->where('is_active', 1);
        })->first();
        if ($hostDetail) {
            $hostDetail->cover_image = $hostDetail->cover_image ? storageUrl($hostDetail->cover_image) : '';
            $hostDetail->interested_in = ($hostDetail->interested_in != null) ? interestedIn()[$hostDetail->interested_in] : "";
            $hostDetail->user->avatar = $hostDetail->user->avatar ? storageUrl($hostDetail->user->avatar) : '';
        }

        $relateds = [];
        $girls = Host::with('user', 'specific')->whereHas('user', function ($query) use ($username) {
            return $query->where('username', '!=', $username)->where('is_active', 1)->where('is_online', 1)->where('gender', 'female');
        })->get()
        ->map(function ($item) {
            $item->user->avatar = $item->user?->avatar ? storageUrl($item->user->avatar) : '';
            return $item;
        });

        if ($hostDetail) {
            $relateds = $hosts->where('specific_id', $hostDetail->specific_id)->where('is_online', 1);
        }

        $recommended = $hosts->where('is_online', 1);

        $ip = $request->ip();

        $like = HostFavourite::where('ip_address', $ip)->where('host_id', $hostDetail->uuid)->count();

        $totalLike = HostFavourite::where('host_id', $hostDetail->uuid)->count();
        $channelName = Str::random(12);
        return inertia('HostDetail', [
            'hosts'      => $hosts,
            'hostDetail' => $hostDetail,
            'like'       => $like,
            'totalLike'  => $totalLike,
            'girls'      => $girls,
            'recommended'=> $recommended,
            'relateds'   => $relateds,
            'channel'    => $channelName,
            'app-id'    =>  env('AGORA_APP_ID'),
        ]);
    }

    public function allowPermission()
    {
        session()->put('is_18', true);
        return redirect('/');
    }

    public function termOfUse()
    {
        $list = TermUse::orderBy('order', 'asc')->get();
        return inertia('TermUse', ['lists'=>$list]);
        // return view('frontend.term_of_use', compact('list'));
    }

    public function privacyPolice()
    {
        $data = Page::where('slug', 'privacy-policy')->first();
        return inertia('CustomPage', ['page_data'=>$data]);
    }

    public function refundPolicy()
    {
        $data = Page::where('slug', 'payment-refund-policy')->first();
        return inertia('CustomPage', ['page_data'=>$data]);
    }

    public function cookiesPolicy()
    {
        $data = Page::where('slug', 'cookies-policy')->first();
        return inertia('CustomPage', ['page_data'=>$data]);
    }

    public function contact_us()
    {
        $data = Page::where('slug', 'contact-us')->first();
        return inertia('CustomPage', ['page_data'=>$data]);
    }

    public function about_us()
    {
        $data = Page::where('slug', 'about-us')->first();
        return inertia('CustomPage', ['page_data'=>$data]);
    }

    /**
     * @return JsonResponse
     */
    public function generateUsername()
    {
        $username = $this->generateUniqueUsername();
        $username_exist = DB::table('users')->where('username', $username)->exists();
        if ($username_exist) {
            $this->generateUsername();
        }
        return response()->json($username);
    }

    private function generateUniqueUsername()
    {
        $faker = Factory::create();
        return str_replace('.', '_', $faker->userName);
    }

    /**
     * @param SignupRequest $request
     * @return JsonResponse
     */
    public function registerUser(SignupRequest $request)
    {
        $validator = $request->validatedAttribute();
        // $password = $request->password ?? generatePassword();
        $user = User::create($validator);
        $roleId = $this->service->getUserRoleId();
        $user->attachRole($roleId);
        Auth::loginUsingId($user->uuid);
        return response()->json([
            'url' => url('/')
        ]);
    }

    public function loginUser(Request $request)
    {
        $login_with = 'username';
        if (str_contains($request->username, '@')) {
            $login_with = 'email';
        }
        $request->validate([
            'username' => 'required|exists:users,' . $login_with,
            'password' => 'required'
        ]);
        $user = User::where("$login_with", $request->$login_with)->first();
        $creds = [
            "$login_with" => $request->username,
            'password'    => $request->password,
            'is_active'   => 1
        ];
        if ($user->hasRole('user') && Auth::attempt($creds)) {
            return response()->json([
                'url'     => url('/'),
                'msg'     => 'success',
                'user_id' => auth()->id()
            ]);
        } else {
            return response()->json([
                'errors' => (object)['username' => 'Authentication failed, please check your login details']
            ], 401);
        }
    }

    public function userHome()
    {
        return view('frontend.afterlogin');
    }

    public function buyToken()
    {
        $list = Coin::orderBy('amount')->get();
        return view('frontend.buy_token', compact('list'));
    }

    public function userProfile()
    {
        return inertia('Profile/Index');
    }

    public function myFavourites(Request $request)
    {
        $ip = $request->ip();
        $favHostArr = HostFavourite::where('ip_address', $ip)->pluck('host_id')->toArray();

        $hosts = Host::with('user', 'country')->whereIn('uuid', $favHostArr)->whereHas('user', function ($query) {
            return $query->where('is_active', 1);
        })->get()
        ->map(function ($item) {
            $item->user->avatar = $item->user?->avatar ? storageUrl($item->user->avatar) : '';
            if ($item->country) {
                $item->country->code = $item?->country?->code ? strtolower($item->country->code) : '';
                $item->cflag = 'https://ipdata.co/flags/' . strtolower($item->country->code) . '.png';
            }
            return $item;
        });
        return inertia('Favourite', ['hosts'=>$hosts ?? []]);
    }

    public function logoutUser(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            //create a user using socialite driver google
            return $this->createSocialUser('google');
            //catch exceptions
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    public function handleFacebookCallback()
    {
        // try {
        //create a user using socialite driver facebook
        return $this->createSocialUser('facebook');
        //catch exceptions
        // } catch (Exception $e) {
        //     throw $e->getMessage();
        // }
    }

    private function createSocialUser($driver)
    {
        $user = Socialite::driver($driver)->user();
        // if the user exits, use that user and login
        $finduser = User::where('provider_id', $user->id)->orWhere('email', $user->email)->first();
        if ($finduser) {
            //if the user exists, login and show dashboard
            Auth::login($finduser);
            return redirect('/');
        } else {
            $password = 'password' ?? generatePassword();
            //user is not yet created, so create first
            $newUser = User::create([
                'name'        => $user->name,
                'email'       => $user->email,
                'provider'    => 'google',
                'provider_id' => $user->id,
                'password'    => bcrypt($password)
            ]);
            $newUser->attachRole($this->service->getUserRoleId());
            //login as the new user
            Auth::login($newUser);
            // go to the dashboard
            return redirect('/');
        }
    }

    /**
     * @return Response|ResponseFactory
     */
    public function becomeModel()
    {
        return inertia('BecomeModel/Index', [
            'interests'  => interestedIn(),
            'languages'  => $this->getMasterData('languages'),
            'specifics'  => $this->getMasterData('specifics'),
            'subculture' => $this->getMasterData('subcultures'),
            'pricing'    => $this->getPricing(),
            'countries'  => $this->getCountry()
        ]);
    }

    /**
     * @return Collection
     */
    private function getMasterData($table)
    {
        return DB::table($table)
            ->select('uuid', 'name', 'description')
            ->get();
    }

    private function getPricing()
    {
        return Pricing::withoutEvents(function () {
            return Pricing::select('uuid', 'plan_name', 'minimum_token_limit', 'maximum_token_limit')->get();
        });
    }

    private function getCountry()
    {
        return Country::withoutEvents(function () {
            return Country::active()->select('id', 'name')->get();
        });
    }

    public function guestSignup()
    {
        $username = $this->generateUniqueUsername();
        $attributes = [
            'device_id' => generateMachineId(),
            'username'  => $username,
            'name'      => $username
        ];
        $user = DB::table('users')->where('device_id', $attributes['device_id'])->first();
        if (!$user) {
            $user = User::create($attributes);
            $roleId = $this->service->getUserRoleId();
            $user->attachRole($roleId);
            Auth::loginUsingId($user->uuid);
            return response()->json([
                'url' => url('/')
            ]);
        } else {
            Auth::loginUsingId($user->uuid);
            return response()->json([
                'url' => url('/')
            ]);
            //            return response()->json([
            //                'errors' => 'Already registered, please use guest login'
            //            ], 401);
        }
    }

    public function guestLogin()
    {
        dd(generateMachineId());
        $user = DB::table('users')->where('device_id', generateMachineId())->first();
        if ($user) {
            auth()->loginUsingId($user->uuid);
            return response()->json([
                'url' => url('/'),
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'msg' => 'Authentication failed, please check your login details'
            ], 401);
        }
    }

    public function getState(Request $request)
    {
        $request->validate([
            'country_id' => 'required'
        ]);
        return response()->json(State::where('country_id', $request->country_id)->select('id', 'name')->get());
    }

    public function manageFavourite(Request $request)
    {
        $request->validate([
            'type'         => 'required',
            'host_id'      => 'required',
            'host_user_id' => 'required'
        ]);
        $ip = $request->ip();
        if ($request->type == 0) {
            HostFavourite::where('host_id', $request->host_id)->where('ip_address', $ip)->delete();
        } else {
            $create = new HostFavourite();
            $create->ip_address = $ip;
            $create->host_id = $request->host_id;
            $create->host_user_id = $request->host_user_id;
            $create->save();
        }

        return $totalLike = HostFavourite::where('host_id', $request->host_id)->count();
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'from' => 'required',
            'about'=> 'required',
            'dob'  => 'required'
        ]);
        auth()->user()->update([
            'name' => $request->name,
            'from' => $request->from,
            'about'=> $request->about,
            'dob'  => $request->dob
        ]);

        return response()->json([
            'msg' => 'Profile has been updated successfully'
        ]);
    }
    public function broadcastCenter()
    {
        return view('frontend.broadcast');
    }

    public function updateProfileImage(Request $request)
    {

        $request->validate([
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName1 = time().'.'.$request->image1->extension();
        $request->image1->move(public_path('images'), $imageName1);

        // $imageName2 = time().'.'.$request->image2->extension();
        // $request->image2->move(public_path('images'), $imageName2);

        $request->user()->update([
            'profile_image' => $imageName1
        ]);

        return response()->json([
            'msg' => 'Profile image has been updated successfully at '.$imageName1,
            'profile_image' => $imageName1,
        ]);
    }

    public function userLevel($token)
    {
        $token = (int)$token;
        // dd($token);
        $level = array();
        $add_amount = 0;
        for($i=1; $i<=50; $i++) {
            $item = array();
            if($i<=5) {
                $add_amount += 100;
                $item['color'] = '#b35d1c';
                $item['name'] = 'Bronze';
                $item['token'] = $add_amount;
                $item['icon'] = '\f005';
            } elseif($i<=10) {
                $add_amount += 500;
                $item['color'] = '#6085aa';
                $item['name'] = 'Silver';
                $item['token'] = $add_amount;
                $item['icon'] = '\f005';
            } elseif($i<=20) {
                $add_amount += 1000;
                $item['color'] = '#dea20c';
                $item['name'] = 'Gold';
                $item['token'] = $add_amount;
                $item['icon'] = '\f005';
            } elseif($i<=35) {
                $add_amount += 5000;
                $item['color'] = '#ce2fe4';
                $item['name'] = 'Diamond';
                $item['token'] = $add_amount;
                $item['icon'] = '\f005';
            } elseif($i<=49) {
                $add_amount += 10000;
                $item['color'] = '#e33534';
                $item['name'] = 'Royal';
                $item['token'] = $add_amount;
                $item['icon'] = '\f005';
            } else {
                $add_amount += 272000;
                $item['color'] = '#278000';
                $item['name'] = 'Legend';
                $item['token'] = $add_amount;
                $item['icon'] = '\f005';
            }
            array_push($level, $item);
        }

        $level_data = array();

        foreach($level as $key=>$value) {
            if($token <= $value['token']) {
                $level_data = $value;
                $level_data['level'] = $key+1;
                break;
            }
        }

        return response()->json([
            'data' => $level_data,
        ]);
    }

    public function setUserToken(Request $req, $id)
    {
        $user = User::where('uuid', $id)->first();
        $host = User::where('uuid', $req->host_id)->first();
        if($user->token > 0) {
            $user->token = $user->token-1;
            $host->token = $host->token+1;
            //here we have to add this token in host
            $tokenSpent = new TokenSpent();
            $tokenSpent->create([
                'user_id' => $id,
                'host_id' => $req->host_id, // I need host_id here
                'token' => 1,
                'type' => 'private_chat',
            ]);

        } else {
            $user->token = 0;
        }
        $user->save();
        $host->save();
    }

    public function storeLiveImage(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = auth()->id().'.'.$request->image->extension();
        $request->image->move(public_path('live_images'), $imageName);

        $host = User::where('uuid', $request->host_id)->first();

        auth()->user()->update([
            'live_image' => $imageName,
        ]);

        return response()->json([
            'status' => true
        ]);

    }

}
