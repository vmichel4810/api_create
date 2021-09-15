<?php

namespace App\Http\Controllers;

use App\Http\Ressources\CircuitsResource;

use App\Models\Circuit;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class CircuitController extends Controller
{

    public function index()
    {
        return Response(Circuit::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\circuits  $circuits
     * @return \Illuminate\Http\Response
     */
    public function show(circuit $circuit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\circuits  $circuits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, circuit $circuit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\circuits  $circuits
     * @return \Illuminate\Http\Response
     */
    public function destroy(circuit $circuit)
    {
        //
    }
}
