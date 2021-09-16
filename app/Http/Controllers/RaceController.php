<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\RaceCollection;
use App\Http\Resources\RaceResource;
//models
use App\Models\Race;
//Illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RaceCollection(Race::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $race = new Race();
        $race->createRace($request->all());
        return response()->json($race, 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\races  $races
     * @return \Illuminate\Http\Response
     */
    public function show($race)
    {
        if($race) {
            return new RaceResource($race);
        }
        return response()->json('race at not found', 404);

        $race = new Race();
        $race->FindOrFail($race);

        return Response($race);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\races  $races
     * @return \Illuminate\Http\Response
     */
    public function update($request, $race) {
        $race->updateRace($race->all());

        return response()->json($race, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\races  $races
     * @return \Illuminate\Http\Response
     */
    public function destroy($race) {
        $race->delete();
        return response()->json('Race deleted', 204);
    }
}
