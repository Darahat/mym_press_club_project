<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Http\Requests\StorepagesRequest;
use App\Http\Requests\UpdatepagesRequest;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(pages $pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepagesRequest  $request
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepagesRequest $request, pages $pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(pages $pages)
    {
        //
    }
}
