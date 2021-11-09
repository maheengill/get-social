<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Event;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class MaxCapacity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * If number of bookings is less than the event capacity, validation passes
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $bookings = DB::table('bookings')
        ->where('event_id', $value)
        ->count();
        $capacity = DB::table('events')->where('id', $value)->value('capacity');
        

        if($bookings < $capacity) return true;
        else return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Event is fully booked.';
    }
}
