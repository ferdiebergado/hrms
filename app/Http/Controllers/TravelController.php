<?php

namespace App\Http\Controllers;

use App\Travelorder;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\TravelFormRequest;
use App\Travel;

class TravelController extends BaseController
{
    protected $modelstr = 'travel';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new $this->model();
        $route = route($this->plural . ".store");
        return view("models.$this->modelstr.partial", compact('route', 'model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelFormRequest $request)
    {
        Travel::create($request->all());
        $route = $this->indexroute;
        $model = $this->modelstr;
        return view("models.$this->modelstr.index", compact('route', 'model'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Travelorder  $travelorder
     * @return \Illuminate\Http\Response
     */
    public function show(Travelorder $travelorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Travelorder  $travelorder
     * @return \Illuminate\Http\Response
     */
    public function edit(Travelorder $travelorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Travelorder  $travelorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Travelorder $travelorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Travelorder  $travelorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travelorder $travelorder)
    {
        //
    }

    public function today()
    {
        $date = '2018-11-6';
        $travels = Travelorder::findEmployeesOnTravelByDate($date);
        return view('today', compact('travels'));
    }
}
