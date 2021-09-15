<?php

namespace App\Http\Controllers;

use App\Models\Result;
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
        return Response(Result::all());
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
    public function show($result)
    {
        if($result) {
            return new ResultResource($result);
        }

        return response()->json('Result at not found', 404);

        $result = new Result();
        $result->FindOrFail($id);

        return Response($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\results  $results
     * @return \Illuminate\Http\Response
     */
    public function update($request, $result) {
        $result->updateResult($result->all());

        return response()->json($result, 281);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\results  $results
     * @return \Illuminate\Http\Response
     */
    public function destroy($result) {
        $result->delete();
        return response()->json('Result deleted', 204);
    }
}
