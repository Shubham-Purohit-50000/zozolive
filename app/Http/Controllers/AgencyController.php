<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Agency,
    Role
};

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agency.list', [
            'agencies'  => Agency::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agency.create');
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
        $validator['role_id'] = Role::where('name', 'agency')->value('uuid');
        $user = User::create($validator);
        Agency::create([
            'mobile'  => request('mobile'),
            'user_id' => $user->uuid,
            'code'    => rand(00000000, 99999999)
        ]);
        return redirectUser(route('studios.index'), 'Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        $agency = $agency->load('host');
        return view('admin.host.list',[
            'hosts' => $agency->host
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit($agency_id)
    {
        $agency = Agency::findOrfail($agency_id);
        return view('admin.agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update($agency_id)
    {
        $agency = Agency::findOrfail($agency_id);
        $validator = $this->validator($agency);
        $agency->user->update($validator);
        $agency->update([
            'mobile'  => request('mobile'),
        ]);
        return redirectUser(route('studios.index'),'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return redirectBack();
    }
    public function validator($agency = null)
    {
        $validator = request()->validate([
            'name'         => 'required|max:255',
            'email'        => $agency && request('email')  == $agency->user->email  ? 'nullable|email'   : 'required|email|unique:users,email',
            'mobile'       => $agency && request('mobile')  == $agency->mobile  ? 'nullable|digits:10'   : 'nullable|digits:10|unique:agencies,mobile',
            'password'     => request()->routeIs('users.store') ? 'required|min:8' : 'nullable|min:8',
        ]);
        $validator['email_verified_at'] = now();
        if (!request('password')) {
            $validator['password'] = $agency->user->password;
        } else {
            $validator['password'] = bcrypt(request('password'));
        }
        return $validator;
    }
}
