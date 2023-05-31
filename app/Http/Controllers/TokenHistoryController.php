<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokenHistory;
use App\Models\CallLog;
use Auth;

class TokenHistoryController extends Controller
{
    public function index()
    {
    	$user_id = Auth::id();
    	$user_type = 'host_id';
    	if(isRole('user')){
    		$user_type = 'user_id';
    	}
    	$calllogs = CallLog::where($user_type,$user_id)->with('user:uuid,name','host_token')->orderBy('created_at','desc')->get();
    	return Inertia('CallLogs',['calllogs'=>$calllogs]);
    }	
}
