<?php

namespace App\Http\Controllers;

use App\Models\TermUse;

use App\Http\Requests\TermUseRequest;

class TermUseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.term-use.list',[
            'results' => TermUse::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.term-use.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermUseRequest $request)
    {
         TermUse::create($request->validated_data());
        return redirectUser(route('term-of-use.index'),'Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function show(TermUse $termUse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=TermUse::find($id);
        return view('admin.term-use.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function update(TermUseRequest $request, $id)
    {
        TermUse::where('uuid',$id)->update($request->validated_data());
        return redirectUser(route('term-of-use.index'),'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TermUse::where('uuid',$id)->delete();
        return redirectBack();
    }

    public function updateStatus(TermUse $termUse)
    {
        $termUse->status = !$termUse->is_active;
        $termUse->save();
        return redirectBack('Updated');
    }
}
