<?php

namespace App\Http\Controllers;
// resources
use App\Http\Resources\ResultCollection;
use App\Http\Resources\ResultResource;
//models
use App\Models\Result;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ResultCollection(Result::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new Result();
        $result->createResult($request->all());
        return response()->json($result, 281);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\results  $results
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::find($id);
        if($result) {
            return new ResultResource($result);
        }

        return response()->json('Result at not found', 404);

        $result = new Result();
        $result->FindOrFail($result);

        return Response($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\results  $results
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result) {
        $result->updateResult($request->all());

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\results  $results
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result) {
        $result->delete();
        return response()->json('Result deleted', 204);
    }
}
