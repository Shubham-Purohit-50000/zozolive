<?php

namespace App\Http\Controllers;

use App\Models\Sticker;
use App\Http\Requests\StickerRequest;
use Illuminate\Support\Facades\Storage;

class StickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sticker.list',[
            'stickers'  => Sticker::select('uuid','price','image','created_at')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StickerRequest $request)
    {
        if ($request->uuid) {
            $gift = Sticker::findOrFail($request->uuid);
            if ($request->image)
                Storage::delete('public/' . $gift->image);
            $gift->update($request->validated_data());
            return redirectBack('Updated');
        } else {
            Sticker::create($request->validated_data());
            return redirectBack('Created');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sticker  $sticker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sticker $sticker)
    {
        Storage::delete('public/'.$sticker->image);
        $sticker->delete();
        return redirectBack();
    }
}
