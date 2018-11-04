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
    public function testCreatingATravel()
    {
        $travel = factory(\App\Travel::class)->create([
            'activity' => 'Training',
            'venue' => 'Tanza',
            'startdate' => '2018-12-1',
            'enddate' => '2018-12-5'
        ]);
        $this->assertDatabaseHas('travels', [
            'id' => $travel->id,
            'activity' => $travel->activity,
            'venue' => $travel->venue,
            'startdate' => $travel->startdate,
            'enddate' => $travel->enddate
        ]);
    }
}
