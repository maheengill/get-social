<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =['event_id', 'user_id'];

    public function user(){
        return $this->belongsto(User::class); 
    }

    public function events(){
        return $this->belongsto(Event::class); 
    }
}
