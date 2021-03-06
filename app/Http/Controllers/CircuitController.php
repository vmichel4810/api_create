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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CircuitCollection(Circuit::paginate(15));
    }

    /**
    * @OA\Get(
    * path="/api/circuits",
    * operationId="getAllCircuit",
    * description="Return all circuit with their informations.",
    * tags={"Circuits"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */


    
     /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $circuit = Circuit::find($id);
        if ($circuit) {
            return new CircuitResource($circuit);
        } 
        return response()->json('circuit not found!', 404);
    }

    /**
    * @OA\Get(
    * path="/api/circuits/{circuit}",
    * operationId="getAllCircuit",
    * description="Return circuit by ID.",
    * tags={"Circuits"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

     /**
    * @OA\Post(
    * path="/api/circuits/",
    * operationId="CreateCircuit",
    * description="Create new circuit.",
    * tags={"Circuits"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */


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

    /**
    * @OA\Patch(
    * path="/api/circuits/{circuit}",
    * operationId="UpdateCircuit",
    * description="Update circuit by Id.",
    * tags={"Circuits"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */


   
/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Circuit  $circuit
     * @return \Illuminate\Http\Response
     */

    public function destroy(Circuit $circuit)
    {
        $circuit->delete();
        return response()->json('', 204);
    }

<<<<<<< HEAD

    function search($data) {
=======
    function search($data) {
        
        return Circuit::where("circuitRef", 'like', '%' . $data . '%')->get();
>>>>>>> 149f258720f357635c455a7ba6a57f545dca0bfa

            return Circuit::where("circuitRef", 'like', '%' . $data . '%')->get();

<<<<<<< HEAD
    }
    
=======
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
>>>>>>> 149f258720f357635c455a7ba6a57f545dca0bfa


    /**
    * @OA\Delete(
    * path="/api/circuits/{circuit}",
    * operationId="UpdateCircuit",
    * description="Update circuit by Id.",
    * tags={"Circuits"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */

}
