<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TravelTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateTravel()
    {
        // $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        $user = factory(\App\User::class)->create();
        $data = [
            'activity' => 'Training',
            'venue' => 'Tanza',
            'startdate' => '2018-12-1',
            'enddate' => '2018-12-5'
        ];

        $response = $this->actingAs($user)->json('POST', '/travels', $data);
        $this->assertDatabaseHas('travels', $data);
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Travel created successfully!"]);
        $response->assertJsonStructure(['data' => [
            'id',
            'activity',
            'venue',
            'startdate',
            'enddate',
            'created_at',
            'updated_at'
        ]]);
    }
}
