<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LanguageController extends Controller
{
    protected string $base_view = 'admin.language';
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view("{$this->base_view}.list",[
            'languages' => Language::withoutEvents(function(){
                return Language::all();
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
     * @param LanguageRequest $request
     * @return RedirectResponse
     */
    public function store(LanguageRequest $request)
    {
        Language::create($request->validated());
        return redirectUser(route('languages.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Language $language
     * @return View
     */
    public function edit(Language $language)
    {
        return view("{$this->base_view}.edit",compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LanguageRequest $request
     * @param Language $language
     * @return RedirectResponse
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $language->update($request->validated());
        return redirectUser(route('languages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Language $language
     * @return RedirectResponse
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirectBack();
    }
}
