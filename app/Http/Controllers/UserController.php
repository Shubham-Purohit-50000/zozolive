<?php

namespace App\Http\Controllers;

use App\Models\Host;
use App\Models\User;
use App\Models\Role;
use App\Models\TokenSpent;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Http\Request;
use App\Models\Recharge;
use App\Models\Coin;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.list', [
            'users' => User::withoutEvents(function () {
                return User::with('role')->get();
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', [
            'roles' => $this->getRole(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validator = $this->validator();
        $validator['email_verified_at'] = now();
        $validator['password'] = bcrypt(request('password'));
        $validator['is_active'] = request('is_active') ?? 0;
        $user = User::create($validator);
        $user->role_id = request('role_id');
        return redirectUser('users', 'Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user'          => $user,
            'roles'         => $this->getRole(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $validator = $this->validator($user);
        if (!request('password')) {
            $validator['password'] = $user->password;
        } else {
            $validator['password'] = bcrypt(request('password'));
        }
        if (request('role_id')) {
            $user->role_id = request('role_id');
        }
        if (request('avatar')) {
            $validator['avatar'] = 'user-avatars/' . request('avatar')->hashName();
            request('avatar')->store('public/user-avatars/');
        }

        $validator['is_active'] = request('is_active') ?? 0;
        $user->update($validator);
        return redirect('users')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return back()->with('error', 'you can\'t delete super admin');
        }
        try {
            $user->detachRole();
        } catch (\Throwable $th) {
            //throw $th;
        }
        // $user->delete();
        return back()->with('success', 'Record Deleted Successfully');
    }

    public function changeStatus(User $user, $status)
    {
        $user->update(['is_active' => $status]);
        return back()->with('success', 'Status Change Successfully');
    }

    public function validator($user = null)
    {
        return request()->validate([
            'name'            => 'required|max:255',
            'email'           => $user && request('email') == $user->email ? 'nullable|email' : 'nullable|email|unique:users,email',
            'role_id'         => $user && currentUserId() != $user->uuid ? 'required' : 'nullable',
            'password'        => request()->routeIs('users.store') ? 'required|min:8' : 'nullable|min:8',
            'is_active'       => 'nullable'
        ]);
    }

    public function getRole()
    {
        return Role::where('name', 'admin')->pluck('name', 'uuid');
    }

    public function updateStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->email_verified_at = now();
        $user->save();
        // if ($user->roles->pluck('name')->contains('host')) {
        //     $serviceAccount = ServiceAccount::fromValue(storage_path('app/parrychat-314e6-firebase-adminsdk-jal5q-0b38236de5.json'));

        //     $factory = (new Factory)->withServiceAccount($serviceAccount)
        //         ->withDatabaseUri('https://parrychat-314e6-default-rtdb.asia-southeast1.firebasedatabase.app/')->createDatabase();
        //     $references = $factory->getReference('Host')->getValue();
        //     if ($references) {
        //         foreach ($references as $key => $value) {
        //             if ($key == $user->firebase_id) {
        //                 $factory->getReference('Host')->getChild($key)->update([
        //                     'isActive' => $user->is_active ? 1 : 0
        //                 ]);
        //             }
        //         }
        //     }
        // }
        return redirectBack('Updated');
    }

    public function updateProfile()
    {
        return view('admin.user.profile-update')->with('user', auth()->user());
    }

    
        public function sendTip(Request $req){
            $user = User::where('uuid', $req->user_id)->first();
            if($user->token < $req->token_amount){
                return response()->json([
                    'status'=>'error',
                    'msg'=>'User dont have have sufficient token!',
                ]);
                die();
            }

            $host = User::where('uuid', $req->host_id)->first();
            $user->token = $user->token - $req->token_amount;
            $host->token = $host->token + $req->token_amount;
            $user->update();
            $host->update();

            $tokenSpent = new TokenSpent();
            $tokenSpent->create([
                'user_id' => $req->user_id,
                'host_id' => $req->host_id,
                'token' => $req->token_amount,
                'type' => 'spend_tip',
            ]);
            
            return response()->json(
                [
                'status'=>'success',
                'msg'=>'Tip sent successfully!',
                ]
            );
        }

        public function storeLiveImage(Request $request){
            $user = $request->user();
            $user->live_image =  $request->image;
            $user->save();
            return response()->json([
                'status' => true
            ]);
    
        }

        public function userToken($user_id){
            $coin = Coin::all()->pluck('coin', 'uuid');
            //dd($coin);
            $user = User::where('uuid', $user_id)->first();
            $recharge = Recharge::where('user_id', $user_id)->latest()->get();
            //dd($user);
            return view('admin.user.token-history', [
                'user'=> $user,
                'recharge'=>$recharge,
                'coin' => $coin
            ]);
        }

        public function updateToken(Request $request, $user_id){

            $coin = Coin::where('uuid', $request->coin_id)->first();

            $user = User::where('uuid', $user_id)->first();
            $user->token += $coin->coin;
            $user->update();

            Recharge::create([
                'user_id' => $user_id,
                'coin_id' => $request->coin_id,
                'amount' => $coin->amount,
                'coin' => $coin->coin,
                'status' => 'paid',
                'type' => 'offline',
            ]);

            return back()->with('success', 'Token Updated Successfully');
        }
        
        
        public function updateUserStatus(Request $request){
            $host = Host::where('user_id', $request->user_id)->first();
            $host->is_online =  $request->is_online;
            $host->save();
            return response()->json([
                'host' =>  $host
            ]);
        }
    }
    