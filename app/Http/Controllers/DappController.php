<?php

namespace App\Http\Controllers;

use App\Models\Dapp;
use App\Http\Requests\StoreDappRequest;
use App\Http\Requests\UpdateDappRequest;

class DappController extends Controller
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
     * @param  \App\Http\Requests\StoreDappRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDappRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dapp  $dapp
     * @return \Illuminate\Http\Response
     */
    public function show(Dapp $dapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dapp  $dapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Dapp $dapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDappRequest  $request
     * @param  \App\Models\Dapp  $dapp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDappRequest $request, Dapp $dapp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dapp  $dapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dapp $dapp)
    {
        //
    }
}
