<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\UserFactory;
use Database\Factories\EventFactory;
use App\Models\Event;
use App\Models\User;


class EventTest extends TestCase
{
    /**
     * A test to check a request to the home page.
     *
     * @return void
     */

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

    public function test_users_can_access_events()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->get('/events');
        $response->assertStatus(200);
    }

    public function test_users_cannot_access_create_events()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->get('/events/create');
        $response->assertStatus(403);
    }

    public function test_admin_can_access_create_events()
    {
        $admin = User::factory()->create(['user_type' => '1']);
        $response = $this->actingAs($admin);
        $response = $this->get('/events/create');
        $response->assertStatus(200);
    }

    public function test_update_events() {    
        $this->withoutMiddleware();
        $newDescription = 'A description';    
        $event = Event::factory()->create();    
        $user = User::factory()->create(['user_type' => '1']);
        $response = $this->actingAs($user)        
        ->followingRedirects()        
        ->patch("/events/{$event->id}", [
            'name' => 'name',            
            'description' => $newDescription,
            'venue' => 'venue',
            'start_time' => '2021-12-30 05:00:00',
            'end_time' => '2021-12-30 06:00:00',
            'capacity' => '20'
        ]);
        $newEvent = $event->fresh();     
        $response->assertOk();            
        $this->assertEquals($newDescription, $newEvent->description);            
    }

    
    public function admin_can_create_event()
    {
        $admin = User::factory()->create(['user_type' => '1']);
        $event = Event::factory()->make()->toArray();
        $response = $this->patch('/events/create', $event);
        $this->assertDatabaseHas(
            'events',
            [
                'name' => $event['name']
            ]
        );
    }

    
}
