<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTravelTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatingTravel()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/travels/create')
                ->type('activity', 'Writeshop')
                ->type('venue', 'Jolo')
                ->type('startdate', '2018-11-12')
                ->type('enddate', '2018-11-17')
                ->press('SAVE')
                ->assertRouteIs('travels.index');
        });
    }
}
