<?php

namespace App\Http\Controllers;

use App\Helpers\RequestParser;
use App\Helpers\RequestCriteria;
use App\Helpers\DataTableHelper;

abstract class BaseController extends Controller
{
    use RequestParser;
    use RequestCriteria;
    use DataTableHelper;

    protected $namespace = "App\\";
    protected $modelstr;
    protected $plural;
    protected $indexroute;
    protected $model;

    public function __construct()
    {
        $this->pluralizeModel();
        $this->setIndexRoute();
        $this->setModel();
    }

    private function setModel()
    {
        $this->model = $this->namespace . ucfirst($this->modelstr);
    }

    private function pluralizeModel()
    {
        $this->plural = str_plural($this->modelstr);
    }

    private function setIndexRoute()
    {
        $this->indexroute = $this->plural . ".index";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function processJson($relations)
    {
        $data = $this->model::with($relations)->get();

        if (request()->has('length')) {
            $model = $this->datatablePaginate($this->model, $relations);
            $draw = $model['draw'];
            $data = $model['data'];
        }

        if (request()->wantsJson()) {
            return response()->json([
                'draw' => $draw ?? null,
                'data' => $data,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function createResponse()
    {
        $model = new $this->model();
        $route = route($this->plural . '.store');
        return view('models.' . $this->modelstr . '.partial', compact('route', 'model'));
    }

}
