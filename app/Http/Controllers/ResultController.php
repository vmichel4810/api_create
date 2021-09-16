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

    public function index()
    {
        return new ResultCollection(Result::paginate(15));
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
        $result->FindOrFail($result);

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
