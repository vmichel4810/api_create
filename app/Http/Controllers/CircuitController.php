<?php

namespace App\Http\Controllers;

use App\Http\Resources\CircuitResource;

use App\Models\Circuit;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class CircuitController extends Controller
{

    public function index()
    {
        return Response(Circuit::all());
    }


    public function store(Request $request)
    {
        $circuit = new Circuit();
        $circuit->createCircuit($request->all());
        return response()->json($circuit, 281);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\circuits  $circuits
     * @return \Illuminate\Http\Response
     */
    public function show($circuits)
    {
        if($circuit) {
            return new CircuitResource($circuit);
        }

        return response()->json('driver at not found', 404);

        $driver = new Circuit();
        $driver->FindOrFail($circuit);

        return Response($circuit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\circuits  $circuits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, circuit $circuits)
    {
        $circuit->updateDriver($circuit->all());

        return response()->json($circuit, 281);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\circuits  $circuits
     * @return \Illuminate\Http\Response
     */
    public function destroy(circuits $circuits)
    {
        //
    }
}
