<?php

namespace App\Http\Controllers;

use App\Models\PushNotification;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PushNotificationRequest;

class PushNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.push-notification.list',[
            'notifications' => PushNotification::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.push-notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PushNotificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PushNotificationRequest $request)
    {
        PushNotification::create($request->validated_data());
        return redirectUser(route('push-notifications.index'),'Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PushNotification  $pushNotification
     * @return \Illuminate\Http\Response
     */
    public function show(PushNotification $pushNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PushNotification  $pushNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(PushNotification $pushNotification)
    {
        return view('admin.push-notification.edit',compact('pushNotification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PushNotificationRequest  $request
     * @param  \App\Models\PushNotification  $pushNotification
     * @return \Illuminate\Http\Response
     */
    public function update(PushNotificationRequest $request, PushNotification $pushNotification)
    {
        if($request->image){
            Storage::delete('public/'.$pushNotification->image);
        }
        $pushNotification->update($request->validated_data());
        return redirectUser(route('push-notifications.index'),'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PushNotification  $pushNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(PushNotification $pushNotification)
    {
        Storage::delete('public/' . $pushNotification->image);
        $pushNotification->delete();
        return redirectBack();
    }
}
