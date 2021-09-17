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
use PhpParser\Node\Expr\Isset_;

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

    function search($data) {
        
        return Circuit::where("circuitRef", 'like', '%' . $data . '%')->get();

    }

//     function filterData(Request $request) {
//         $circuit = collect([1, 2, 3, 4]);

//         $filtered = $circuit->filter(function ($circuit, $key) {
//             return $circuit > 2;
//         });

//         $filtered->all();
 
//     }
//     public function searchFilters($request){
//         $query = Circuit::query();
//         if($request->has('circuitId')){
//             $query = $query->where('title','like','%'.$request->name.'%');
//         }
//         if($request->has('circuitRef')){
//             $query = $query->where('negotiable',$request->circuitRef);
//         }
//         if($request->has('name')){
//             $query = $query->whereIn('name',$request->name);
//         }
//         if($request->has('location')){
//             $query = $query->whereIn('location',$request->location);
//         }
//         if($request->has('country')){
//             $query = $query->whereIn('country',$request->country);
//         }
//         if($request->has('lat')){
//             $query = $query->whereHas('jobLanguageIds',function ($q) use($request){
//                 $q->select('languages.id','languages.name')->where('languages.name',$request->language_name);
//             });
//         }
//         return $query;
//     }

}
