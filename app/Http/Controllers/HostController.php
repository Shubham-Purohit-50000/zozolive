<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{
    FreeCallLog,
    Host,
    HostDailyReport,
    User
};
use App\Http\Requests\HostRequest;
use Illuminate\Http\Request;
use Kreait\Firebase\{
    Factory,
    ServiceAccount
};
use App\Models\HostTipMenu;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.host.list',[
            'hosts' => Host::with('user','agency')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.host.create',[
            'agencies' => Host::with('user','agency')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HostRequest $request)
    {
        $user = User::create($request->validated_data());
        $user->attachRole('host');
        $host = $user->host()->create($request->validated_data());
        if($request->gallery){
            foreach ($request->gallery as $value) {
                $host->gallery()->create([
                    'image' => 'host-gallery/'.$value['image']->hashName(),
                ]);
                $value['image']->store('public/host-gallery');
            }
        }
        return response()->json(['message' => 'Registration Successfully','user_id' => $user->user_id], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        $start = now()->subDays(7)->format('Y-m-d');
        $end = now()->addDay()->format('Y-m-d');
        $query = request('query');
        if($query){
            // explode query date from seperator
            $dates = array_map('trim',explode('-',$query));
            $start = Carbon::parse($dates[0])->format('Y-m-d');
            $end = Carbon::parse($dates[1])->format('Y-m-d');
        }
        $report = HostDailyReport::where('host_id',$host->user_id)->whereBetween('created_at',[$start,$end])->get();
        $host->call_duration = $report->sum('total_duration');
        $host->total_accepted_calls = $report->sum('total_accepted_calls');
        $host->answer_rate = $report->sum('answer_rate');
        $host->total_calls = $report->sum('total_calls');
        $host->gift_coin = $report->sum('gift_coin');
        $host->total_coin = $report->sum('total_coin');
        $host->deducted_coin = $report->sum('deducted_coin');
        $host->final_coin = $report->sum('final_coin');
        $host->total_free_call = FreeCallLog::where('host_user_id',$host->user_id)->whereBetween('created_at',[$start,$end])->count();
        $host->total_free_call_coins = $host->total_free_call * 5;
        return view('admin.host.show',compact('host','query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $host = Host::findOrFail($id);
        return view('admin.host.edit',compact('host'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function update(Host $model)
    {
        $validator = request()->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'dob'       => 'required',
            'avatar'    => 'nullable|image',
            'password'  => 'nullable',
            'is_active' => 'nullable',
//            'per_minute_price'=> 'required'
        ]);
        if (request('avatar')) {
            $validator['avatar'] = request('avatar')->store('public/user-avatars/');
        }
        $validator['password'] = request('password') ? bcrypt(request('password')) : $model->user->password ?? null;
        $validator['is_active'] = request('is_active') ?? 0;
        $model->user->update($validator);
//        $model->update($validator);

//        $serviceAccount = ServiceAccount::fromValue(storage_path('app/parrychat-314e6-firebase-adminsdk-jal5q-0b38236de5.json'));
//
//        $factory = (new Factory)->withServiceAccount($serviceAccount)
//            ->withDatabaseUri('https://parrychat-314e6-default-rtdb.asia-southeast1.firebasedatabase.app/')->createDatabase();
//        $references = $factory->getReference('Host')->getValue();
//        foreach ($references as $key => $value) {
//            if($key == $host->user->firebase_id){
//                $factory->getReference('Host')->getChild($key)->update([
//                    'hostName' => request('name'),
//                    'hostEmail' => request('email'),
//                    'hostDOB' => Carbon::parse(request('dob'))->age,
//                    'hostPrice' => (int) request('per_minute_price'),
//                    'isActive' => (int) request('is_active') ?? 0,
//                ]);
//            }
//        }
        return redirectUser(route('models.index'),'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $model)
    {
        $model->user()->delete();
        $model->delete();
        return redirectBack();
    }

    public function updateGoal(Request $request)
    {
        $validator = $request->validate([
            'goal'      => 'required',
            'goal_token'=> 'required'
        ]);
        auth()->user()->model()->update($validator);
        return response()->json(['msg' => 'success']);
    }

    public function updateTopic(Request $request)
    {
        $validator = $request->validate([
            'today_topic' => 'required'
        ]);
        auth()->user()->model()->update($validator);
        return response()->json(['msg' => 'success']);
    }

    public function hostTipMenu(Request $req){
        $HostTipMenu = HostTipMenu::where('host_id', $req->host_id)->get();
        return response()->json(
            [
                'host_tip_menu'=> $HostTipMenu
            ]
        );
    }

    public function CreateHostTipMenu(Request $req){
        HostTipMenu::create($req->all());
        return response()->json([
            'msg'=>'Tip Menu updated Successfully!'
        ]);
    }

    public function removeHostTipMenu(Request $req){
        $tip_menu = HostTipMenu::where('uuid', $req->uuid)->first();
        $tip_menu->delete();
        return response()->json([
            'msg'=>'Tip Menu removed Successfully!',
        ]);
    }
}
