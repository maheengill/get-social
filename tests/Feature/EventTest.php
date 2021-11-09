<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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
    public function test_get_events(){
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
        $newDescription = 'Some test comments';    
        $event = Event::factory()->create();    
        $user = User::factory()->create(['user_type' => '1']);
        $response = $this->actingAs($user)        
        ->followingRedirects()        
        ->patch("/events/{$event->id}", [            
            'description' => $newDescription
        ]);
        $newEvent = $event->fresh();     
        $response->assertOk();            
        $this->assertEquals($newDescription, $newEvent->description);            
    }

    /** @test */
    public function create_page_requires_validation()
    {
        $admin = User::factory()->create(['user_type' => '1']);
        // Post empty data to the create page route
        $response = $this->post('/events');
        // This should cause errors with the 
        // title and content fields as they aren't present
        $response->assertSessionHasErrors([
            'name',
            'description',
        ]);
    }

    /** @test */
    public function admin_can_create_page()
    {
        $admin = User::factory()->create(['user_type' => '1']);
        // Get data from the Factory
        $page = Event::factory()->make()->toArray();
        // Post data to the 'create' route
        $response = $this->post('/events/create', $page);
        // Check the database has the data we generated with the factory
        $this->assertDatabaseHas(
            'events',
            [
                'name' => $page['name']
            ]
        );
    }
}
