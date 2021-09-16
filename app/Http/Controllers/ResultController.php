<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class ResultController extends Controller
{

    public function index()
    {
        return Response(Result::all());
    }


    public function store(Request $request)
    {
        $result = new Result();
        $result->createResult($request->all());
        return response()->json($result, 281);
    }


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

 
    public function update($request, $result) {
        $result->updateResult($result->all());

        return response()->json($result, 281);
    }


    public function destroy($result) {
        $result->delete();
        return response()->json('Result deleted', 204);
    }
}
