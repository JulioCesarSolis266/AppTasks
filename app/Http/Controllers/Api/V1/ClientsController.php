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
        $relation = Client::with(['user', 'position', 'branch'])->orderBy('id')->get();
        return $relation;
    }

    public function task($clientId)// Para obtener las tareas de un cliente
    {
    // Obtener un client específico
    $client = Client::find($clientId);
    // $client = Client::where('id', $clientId)->first();

    if (!$client) {
        return response()->json(['message' => 'Cliente no encontrado'], 404);
    }

    $tasks = $client->tasks()// Para obtener las tareas de un cliente
        ->with('branch', 'coordinator', 'employee', 'priority', 'client') // Cargar la relación con branch, coordinator y employee.
        ->get();

    return response()->json($tasks, 200);
}

    public function store(Request $request)
    {
        return new ClientResource(Client::create($request->all()));
    }

    // public function show ($id){
    //     $client = Client::with('user','position','branch')->find($id);

    //     return response()->json(['data' => $client]);
    // }

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
