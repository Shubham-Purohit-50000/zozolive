<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecificRequest;
use App\Models\Specific;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SpecificController extends Controller
{

    private string $base_view = 'admin.specific';
    private string $redirect_route = 'specifics.index';
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view("{$this->base_view}.list",[
            'specifics' => Specific::withoutEvents(function(){
                return Specific::all();
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
     * @param SpecificRequest $request
     * @return RedirectResponse
     */
    public function store(SpecificRequest $request)
    {
        Specific::create($request->validated());
        return redirectUser(route($this->redirect_route));
    }

    /**
     * Display the specified resource.
     *
     * @param Specific $specific
     * @return Response
     */
    public function show(Specific $specific)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Specific $specific
     * @return View
     */
    public function edit(Specific $specific)
    {
        return view("{$this->base_view}.edit",compact('specific'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SpecificRequest $request
     * @param Specific $specific
     * @return RedirectResponse
     */
    public function update(SpecificRequest $request, Specific $specific)
    {
        $specific->update($request->validated());
        return redirectUser(route($this->redirect_route));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Specific $specific
     * @return RedirectResponse
     */
    public function destroy(Specific $specific)
    {
        $specific->delete();
        return redirectBack();
    }
}
