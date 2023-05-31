<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricingRequest;
use App\Models\Pricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PricingController extends Controller
{

    private string $redirectRoute = 'pricing.index';
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('admin.pricing.list', [
            'pricings' => Pricing::withoutEvents(function () {
                return Pricing::select('uuid', 'plan_name', 'minimum_token_limit', 'maximum_token_limit')->get();
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
        return view('admin.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PricingRequest $request
     * @return RedirectResponse
     */
    public function store(PricingRequest $request)
    {
        Pricing::create($request->validated());
        return redirectUser(route($this->redirectRoute));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pricing $pricing
     * @return View
     */
    public function edit(Pricing $pricing)
    {
        return view('admin.pricing.edit',compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PricingRequest $request
     * @param Pricing $pricing
     * @return RedirectResponse
     */
    public function update(PricingRequest $request, Pricing $pricing)
    {
        $pricing->update($request->validated());
        return redirectUser(route($this->redirectRoute));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pricing $pricing
     * @return RedirectResponse
     */
    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        return redirectBack();
    }
}
