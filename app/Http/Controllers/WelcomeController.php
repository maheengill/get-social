<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Event;


class WelcomeController extends Controller

{
    public function index(){
        
        return view('welcome', [
            'title' => 'GET SOCIAL',
            'description' => 'Welcome to our website! We organise fun social events for you!'
        ]);
    }

}