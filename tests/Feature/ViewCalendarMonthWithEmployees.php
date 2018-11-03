<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewCalendarMonthWithEmployees extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    public function testViewingCalendarMonthWithEmployees()
    {
        $employee = factory(\App\Employee::class)->create(['lastname' => 'bergado']);
        $travelorder = factory(\App\Travelorder::class)->create(['startdate' => '2018-11-5', 'enddate' => '2018-11-9']);
        $employee->travelorders()->attach($travelorder->id);

        $this->visit('/today')->see('bergado');
    }

    public function testClickingADateOnCalendarWillShowEmployeesWithOrWithoutTravel()
    {
        $this->visit('/calendar');

        $this->click('calendar')->see('events');
    }
}
