<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
        ->count(4)        
        ->create();
    }
}
