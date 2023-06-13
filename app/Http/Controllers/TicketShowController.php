<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketShow;
use App\Models\User;
use App\Models\TokenSpent;
use App\Models\CallLog;
use Auth;

class TicketShowController extends Controller
{
    public function start(Request $request)
    {
        $ticket_show = TicketShow::create([
            'host_id' => $request->host_id,
            'token' => $request->token,
            'start_time' => $request->start_time,
            'status' => '1'
        ]);

        return response()->json($ticket_show);
    }	

    public function join_show(Request $request)
    {
        $ticket_show = TicketShow::where('uuid', $request->show_id)->first();
        //------------ coin transaction
        $user = User::where('uuid', $request->user_id)->first();
        
        $host = User::where('uuid', $ticket_show->host_id)->first();
        $user->token = $user->token - $ticket_show->token;
        $host->token = $host->token + $ticket_show->token;
        $user->update();
        $host->update();

        $tokenSpent = new TokenSpent();
        $tokenSpent->create([
            'user_id' => $request->user_id,
            'host_id' => $ticket_show->host_id,
            'token' => $ticket_show->token,
            'type' => 'ticket_show',
        ]);

        //----------- code to manage ticket_show table
        
        $ticket_show_user_ids = array();
        if($ticket_show->user_ids !=  null){
            $ticket_show_user_ids = Json_decode($ticket_show->user_ids);
        }
        array_push($ticket_show_user_ids, $request->user_id);
        $ticket_show->user_ids = json_encode($ticket_show_user_ids);
        $ticket_show->save();
        return response()->json([
            'status'=>true,
            'msg'=>'user join successfully'
        ]);
    }	

    public function end_show(Request $request){
        $ticket_show = TicketShow::where('uuid', $request->show_id)->first();
        $ticket_show->status = 0;
        $ticket_show->save();
        return response()->json([
            'status'=>true,
            'msg'=>'show ended successfully'
        ]);
    }

}
