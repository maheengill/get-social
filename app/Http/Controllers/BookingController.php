<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate(
            $request, 
            ['event_id' => 'required|unique:bookings,event_id,NULL,id,user_id,'.Auth::id() ],
            ['event_id.unique' => 'Event has already been booked']
        );

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // die();
        
        $booking = new Booking;

        $booking->user()->associate(Auth::user());
        $booking->event_id = $request->event_id;
        $booking->save();

        return redirect()->route('events.index')
        ->with('success','Booking created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $this->validate(
            $request, 
            ['event_id' => 'required|exists:bookings,event_id,user_id,'.Auth::id() ],
            ['event_id.exists' => 'Booking does not exist']
        );

        DB::table('bookings')
        ->where('user_id', Auth::id())
        ->where('event_id', $request->event_id)
        ->delete();
        

        return redirect()->route('events.index')
        ->with('success', 'Booking deleted successfully');
    }
}
