<?php

namespace App\Http\Controllers;

use App\Models\Apk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ApkController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apk.create',[
            'apk' => Apk::first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'version_code' => 'required',
            'apk'          => 'required|string',
        ]);
        $data = [
            'version_code' => $request->version_code,
            'apk'          => $request->apk,
        ];
        if($request->uuid){
            $apk = Apk::find($request->uuid);
            // Storage::delete('public/' . $apk->apk);
            $apk->update($data);
        }else{
            Apk::create($data);
        }
        return back()->with('success', 'Apk has been uploaded successfully.');
    }
    public function upload()
    {
        // request()->validate([
        //     'apk' => 'required|file|mimes:apk'
        // ]);
        $file = request('apk')->storeAs('public/apk', 'parry_chat_host.apk');
        return 'apk/parry_chat_host.apk';
    }

}
