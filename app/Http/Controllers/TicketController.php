<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowTicketResource;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Ticket::all();
        $event = TicketResource::collection($event);
        return response()->json(['success'=>true, 'data' =>$event], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Ticket::store($request);
        return response()->json(['success'=>true, 'data' => $event], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Ticket::find($id);
        $event = new ShowTicketResource($event);
        return response()->json(['success'=>true, 'data' => $event], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Ticket::store($request, $id);
        return response()->json(['success'=>true, 'data' => $event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Ticket::find($id);
        $event ->delete();
        return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
    }
}
