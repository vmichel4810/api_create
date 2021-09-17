<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\CircuitResource;
use App\Http\Resources\CircuitCollection;
use Validator;
//model
use App\Models\Circuit;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;

class CircuitController extends Controller
{

    public function index()
    {
        return new CircuitCollection(Circuit::paginate(15));
    }


    public function store(Request $request)
    {
        $rules=array(
            "circuitRef"=>"required|min:4|max:20",
            "name"=>"required|min:4|max:20",
            "location" =>"required|"
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }else{
            $circuit = new Circuit();
            $circuit->createCircuit($request->all());
            return response()->json($circuit, 201);
        }
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
        $rules=array(
            "circuitRef"=>"required|min:4|max:20",
            "name"=>"required|min:4|max:20",
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }else{

            $circuit->updateCircuit($request->all());

            return response()->json($circuit, 200);
        }
    }


    public function destroy(Circuit $circuit)
    {
        $circuit->delete();
        return response()->json('Driver deleted', 204);
    }

    function search($circuitRef) {

            return Circuit::where("circuitRef", 'like', '%' . $circuitRef . '%')->get();

    }

    function validateData(Request $request) {
        $rules=array(
            "name"=>"required|min:2|max:4",
            "circuitRef"=>"required|min:4|max:8",
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }
        else {
            $circuit = new Circuit;
            $circuit->name=$request->name;
            $circuit->circuitRef=$request->circuitRef;
            $result=$circuit->save();
            if($result) {
                return ["Result"=>"Data has been saved"];
            } else {
                return ["Result"=>"Operation failed"];
            }
        }
    }
    

}
