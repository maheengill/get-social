<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;


class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_visitors(){
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->get('/events');
        $response->assertOk();
        $response->assertViewIs('events.index');
        $expectedPage1NameData = Event::orderBy('start_time', 'asc')
            ->take(20)
            ->pluck('description');
        $response->assertSeeInOrder(array_merge(['Our events'], $expectedPage1NameData->toArray()));
    }

    public function test_a_basic_request()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_without_login()
    {
        $response = $this->get('/events');

        $response->assertStatus(302);
    }

    public function test_another_basic_request()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->get('/events');
        $response->assertStatus(200);
    }

    public function test_update_events() {    
        $this->withoutMiddleware();
        $newDescription = 'Some test comments';    
        $event = Event::factory()->create();    
        $user = User::factory()->create();
        $response = $this->actingAs($user)        
        ->followingRedirects()        
        ->patch("/events/{$event->id}", [            
            'description' => $newDescription
        ]);
        $newEvent = $event->fresh();     
        $response->assertOk();            
        $this->assertEquals($newDescription, $newEvent->description);            
    }

    function test_can_update_an_order()
    {
        $this->withoutMiddleware();
        $event = Event::factory()->create(); // other attributes from the factory definition
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $this->putJson("events/{$event->id}", ['description' => 'new description'])
            ->assertStatus(200)
            ->assertJsonFragment(['description' => 'new description']);

        // Make assertions about other side-effects for **this** particular action.
    }
}
