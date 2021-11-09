<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('start_time', '>', date('Y-m-d H:i:s'))->orderBy('start_time', 'asc')
        ->paginate(20);
        
        return view('events/index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->user_type != 1){
            abort(403);
        }

        return view('events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $DateTimeNow = date('Y-m-d H:i:s');

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'venue' => 'required',
            'start_time' => 'required|after:'.$DateTimeNow,
            'end_time' => 'required|after:start_time|after:'.$DateTimeNow,
            'capacity' => 'required|integer|between:0,1000'
        ]);

        
        $event = new Event;

        $event->name = $request->name;
        $event->description = $request->description;
        $event->venue = $request->venue;
        $event->start_time = date("Y-m-d H:i:s", strtotime($request->start_time));
        $event->end_time = date("Y-m-d H:i:s", strtotime($request->end_time));
        $event->capacity = $request->capacity;

        $event->save();



        return redirect()->route('events.index')
        ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        
        return view('events.show', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if (auth()->user()->user_type != 1){
            abort(403);
        }

        return view('events.edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $event->update($request->all());
        
        return redirect()->route('events.index')
        ->with('success', 'Event updated successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if (auth()->user()->user_type != 1){
            abort(403);
        }

        $event->delete();
        
        return redirect()->route('events.index')
        ->with('success', 'Event deleted successfully');
    }
}
