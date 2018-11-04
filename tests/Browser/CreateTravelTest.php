<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTravelTest extends DuskTestCase
{
    use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatingTravel()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/travels/create')
                ->type('activity', 'NTOT')
                ->type('venue', 'Jolo')
                ->type('startdate', '2018-11-12')
                ->type('enddate', '2018-11-17')
                ->press('SAVE')
                ->assertRouteIs('travels.index');
        });
    }
}
