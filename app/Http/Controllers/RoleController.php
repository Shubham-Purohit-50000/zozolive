<?php

namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.list', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $role = Role::create($this->validator());
        return redirectUser('roles','Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', [
            'role'        => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {
        $role->update($this->validator($role));
        return redirectUser('roles','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->name == 'super-admin') {
            return back()->with('error', 'You can not delete super admin');
        } else {
            $role->delete();
            return back()->with('success', 'Record Deleted Successfully');
        }
    }
    public function validator($role = null)
    {
        return request()->validate([
            'name'          => $role && $role->name == request('name') ? 'required|max:100' : 'required|unique:roles|max:100|regex:/^[a-zA-Z -]*$/',
            'display_name'  => 'required|max:100|regex:/^[a-zA-Z  ]*$/',
            'description'   => 'nullable|max:255|regex:/^[a-zA-Z ]*$/',
        ]);
    }
}