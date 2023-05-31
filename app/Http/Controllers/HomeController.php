<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Host;

// use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function complaintList()
    {
        return view('admin.complaint.list', [
            'complains' => Complaint::with('user:user_id,uuid,name', 'host:uuid,user_id')->get()
        ]);
    }

    public function deleteComplaint(Complaint $complaint)
    {
        $complaint->delete();
        return back()->with('success', 'Complain deleted successfully');
    }

    public function termOfUse()
    {
        return view('frontend.term_of_use');
    }

    public function agoraVideo()
    {
        return Inertia('Agora');
    }
}
