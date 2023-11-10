<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\ClientResource;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $relation = Client::with(['user', 'position', 'branch','task'])->orderByDesc('id')->get();
        return $relation;
    }

    public function store(Request $request)
    {
        return new ClientResource(Client::create($request->all()));
    }

    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    public function update(Request $request, Client $client)
    {
        if ($client->update($request->all())) {
            return response()->json([
                'message' => 'Client updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error updating client'
            ], 500);
        }
    }

    public function destroy(Client $client)
    {
        if ($client->delete()) {
            return response()->json([
                'message' => 'Client deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error deleting client'
            ], 500);
        }
    }
}
