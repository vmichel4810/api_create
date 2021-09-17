<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\CircuitResource;
use App\Http\Resources\CircuitCollection;
//model
use App\Models\Circuit;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class CircuitController extends Controller
{

    public function index()
    {
        return new CircuitCollection(Circuit::paginate(15));
    }


    public function store(Request $request)
    {
        $circuit = new Circuit();
        $circuit->createCircuit($request->all());
        return response()->json($circuit, 201);
    }

    public function show($id)
    {
        $circuit = Circuit::find($id);
        if($circuit) {
            return new CircuitResource($circuit);
        }

        return response()->json('circuit not found', 404);

    }


    public function update(Request $request, circuit $circuit)
    {
        $circuit->updateCircuit($request->all());

        return response()->json($circuit, 200);
    }


    public function destroy(Circuit $circuit)
    {
        $circuit->delete();
        return response()->json('Driver deleted', 204);
    }
}
