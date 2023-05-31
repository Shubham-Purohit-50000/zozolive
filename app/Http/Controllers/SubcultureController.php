<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcultureRequest;
use App\Models\Subculture;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubcultureController extends Controller
{

    private string $base_view = 'admin.subculture';
    private string $redirect_route = 'subcultures.index';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view("{$this->base_view}.list",[
            'subcultures' => Subculture::withoutEvents(function(){
                return Subculture::all();
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view("{$this->base_view}.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubcultureRequest $request
     * @return RedirectResponse
     */
    public function store(SubcultureRequest $request)
    {
        Subculture::create($request->validated());
        return redirectUser(route($this->redirect_route));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Subculture $subculture
     * @return View
     */
    public function edit(Subculture $subculture)
    {
        return view("{$this->base_view}.edit",compact('subculture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubcultureRequest $request
     * @param Subculture $subculture
     * @return RedirectResponse
     */
    public function update(SubcultureRequest $request, Subculture $subculture)
    {
        $subculture->update($request->validated());
        return redirectUser(route($this->redirect_route));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subculture $subculture
     * @return RedirectResponse
     */
    public function destroy(Subculture $subculture)
    {
        $subculture->delete();
        return redirectBack();
    }
}
