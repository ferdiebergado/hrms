<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function show()
    {
        $events = 'events';
        return view('calendar', compact('events'));
    }
}
