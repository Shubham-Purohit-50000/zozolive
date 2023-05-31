<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CountryController extends Controller
{
    private string $base_view = 'admin.country';
    private string $redirectRoute = 'countries.index';
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view("{$this->base_view}.list",[
            'countries' => Country::withoutEvents(function(){
                return Country::all();
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
        return view("{$this->view}.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     */
    public function store(CountryRequest $request)
    {
        Country::create($request->validated());
        return redirectUser(route($this->redirectRoute));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return View
     */
    public function edit(Country $country)
    {
        return view("{$this->base_view}.edit",compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Country $country
     * @return RedirectResponse
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated());
        return redirectUser(route($this->redirectRoute));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return RedirectResponse
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirectBack();
    }

    public function updateStatus(Country $country)
    {
        $country->is_active = !$country->is_active;
        $country->save();
        return redirectBack('Updated');
    }
}
