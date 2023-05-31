<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Http\Requests\GiftRequest;
use Illuminate\Support\Facades\Storage;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gift.list', [
            'gifts' => Gift::all()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftRequest $request)
    {
        if ($request->uuid) {
            $gift = Gift::findOrFail($request->uuid);
            if ($request->image)
                Storage::delete('public/' . $gift->image);
            $gift->update($request->validated_data());
            return redirectBack('Updated');
        } else {
            Gift::create($request->validated());
            return redirectBack('Created');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
        Storage::delete($gift);
        $gift->delete();
        return redirectBack();
    }
}
