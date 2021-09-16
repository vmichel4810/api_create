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

    public function show($circuit)
    {
        if($circuit) {
            return new CircuitResource($circuit);
        }

        return response()->json('driver at not found', 404);

        $driver = new Circuit();
        $driver->FindOrFail($circuit);

        return Response($circuit);
    }


    public function update(Request $request, circuit $circuit)
    {
        $circuit->updateCircuit($circuit->all());

        return response()->json($circuit, 281);
    }


    public function destroy(circuit $circuit)
    {
        $circuit->delete();
        return response()->json('Driver deleted', 204);
    }
}
