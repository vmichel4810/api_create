<?php

namespace App\Http\Controllers;

use App\Http\Resources\CircuitResource;

use App\Models\Circuit;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;

class CircuitController extends Controller
{

    public function index()
    {
        $circuit = DB::table('circuit')->paginate(15);
        //$circuit = DB::table('circuit')->where('name', 100)->get();
        //$circuit->query('name', 'location', 'contry');

        return view('circuit.index', ['driver' => $circuit]);
        return Response(Circuit::all());
    }


    public function store(Request $request)
    {
        $circuit = new Circuit();
        $circuit->createCircuit($request->all());
        return response()->json($circuit, 281);
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

    function search($surname) {

        $query = Circuit::query();
        return Circuit::where("name", $surname)->get();
    }
}
