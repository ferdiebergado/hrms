<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Travel;

class CreateTravelTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatingATravelorder()
    {
        $this->withExceptionHandling();
        $model = new \App\Travel();
        $this->visit('/travels/create')
            ->seeRouteIs('travels.create')
            ->assertViewHas('route', route('travels.store'))
            ->assertViewHas('model', $model)
            ->see('Travel')
            ->assertResponseStatus(200)
            ->type('Sample Workshop', 'activity')
            ->type('Tagaytay City', 'venue')
            ->type('2018-11-5', 'startdate')
            ->type('2018-11-9', 'enddate')
            ->press('SAVE')
            ->seeRouteIs('travels.index');
            // ->seePageIs('/travels');
    }
}
