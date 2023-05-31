<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    OfficialMessage
};
use App\Http\{
    Traits\SendNotificationTrait,
    Requests\OfficialMessageRequest
};

class OfficialMessageController extends Controller
{
    use SendNotificationTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.official-message.list',[
            'messages'  => OfficialMessage::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.official-message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficialMessageRequest $request)
    {
        $attributes = $request->validated_data();
        OfficialMessage::create($attributes);
        $payload = [
            "title" => "New message from admin",
            "body"  => array_merge($attributes, ['type' => 'official-message']),
        ];
        $this->sendNotification($payload, $this->getHostFcmToken());
        return redirectUser(route('official-messages.index'),'Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficialMessage  $officialMessage
     * @return \Illuminate\Http\Response
     */
    public function show(OfficialMessage $officialMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficialMessage  $officialMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficialMessage $officialMessage)
    {
        return view('admin.official-message.edit',compact('officialMessage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficialMessage  $officialMessage
     * @return \Illuminate\Http\Response
     */
    public function update(OfficialMessageRequest $request, OfficialMessage $officialMessage)
    {
        $attributes = $request->validated_data();
        $officialMessage->update($attributes);
        $payload = [
            "title" => "New message from admin",
            "body"  => array_merge($attributes,['type' => 'official-message']),
        ];
        $this->sendNotification($payload, $this->getHostFcmToken());
        return redirectUser(route('official-messages.index'),'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficialMessage  $officialMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficialMessage $officialMessage)
    {
        $officialMessage->delete();
        return redirectBack();
    }
    private function getHostFcmToken()
    {
        return User::whereNotNull('fcm_token')->whereRelation('role', 'name','host')->pluck('fcm_token')->toArray();
    }
}
