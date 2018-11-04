<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Employee;
use App\Travel;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEmployeeWithTravelCanBeFoundByDate()
    {
        $createdemployee = factory(\App\Employee::class)->create(['lastname' => 'juandelacruz']);
        $travel = factory(\App\Travel::class)->create(['startdate' => '2018-10-1', 'enddate' => '2018-10-5']);
        $createdemployee->travels()->attach($travel->id);
        $date = '2018-10-1';

        $foundemployee = \App\Employee::WithTravelByDate($date);

        $this->assertEquals($createdemployee->id, $foundemployee[0]->id);
        $this->assertEquals($createdemployee->lastname, $foundemployee[0]->lastname);
    }

    public function testEmployeeWithoutTravelCanBeFoundByDate()
    {
        $createdemployee = factory(\App\Employee::class)->create(['lastname' => 'juandelacruz']);
        $travel = factory(\App\Travel::class)->create(['startdate' => '2018-10-1', 'enddate' => '2018-10-5']);
        $createdemployee->travels()->attach($travel->id);
        $date = '2018-10-6';

        $foundemployee = \App\Employee::withoutTravelByDate($date);

        $this->assertEquals($createdemployee->id, $foundemployee[0]->id);
        $this->assertEquals($createdemployee->lastname, $foundemployee[0]->lastname);
    }
}
