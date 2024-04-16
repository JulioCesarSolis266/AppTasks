<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\GenreResource;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {

        return GenreResource::collection(Genre::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new GenreResource(Genre::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        if($genre->update($request->all())){
            return response()->json([
                'message' => 'Genre updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Genre could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        if($genre->delete()){
            return response()->json([
                'message' => 'Genre deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Genre could not be deleted'
            ], 500);
        }
    }
}
