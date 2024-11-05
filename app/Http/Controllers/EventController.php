<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index',compact("events") );
    }

    //Controllers for Create a New event


    public function create()
    {
        //Show the Create form
        return view('events.create');
    }

    public function store(EventRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['occupied_slots'] = 0; 
        Event::create($validatedData);
        
        return redirect()->route('events.index')->with('success', 'event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact("event") );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Evento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route("events.index")->with('success', 'Event eliminada con exito.');
    }

}