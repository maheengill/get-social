<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Event;


class WelcomeController extends Controller

{
    public function index(){
        $events = Event::all();
        
        return view('welcome', [
            'title' => 'Our events',
            'events' => $events
        ]);
    }

}