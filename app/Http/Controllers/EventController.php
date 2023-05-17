<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        $event = EventResource::collection($event);
        return response()->json(['success'=>true, 'data' =>$event], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::store($request);
        return response()->json(['success'=>true, 'data' => $event], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $event = new ShowEventResource($event);
        return response()->json(['success'=>true, 'data' => $event], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTicketRequest $request, string $id)
    {
        $event = Event::store($request, $id);
        return response()->json(['success'=>true, 'data' => $event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event ->delete();
        return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
    }
}
