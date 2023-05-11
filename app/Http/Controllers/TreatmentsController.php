<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Http\Requests\TreatmentRequest;

class TreatmentsController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Tratamientos';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'treatments',
        'index' => 'treatments.index',
        'store' => 'treatments.store',
        'create' => 'treatments.create',
        'show' => 'treatments.show',
        'destroy' => 'treatments.destroy',
        'update' => 'treatments.update',
        'edit' => 'treatments.edit'
    ];

    /**
     * View parameters
     * @var array
     */
    private $params = [];

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->params = [
            'routes' => $this->routes,
            'breadcrumbs' => [
                ['route' => 'home', 'title' => 'Inicio'],
                ['route' => $this->routes['index'], 'title' => $this->resourceTitle]
            ],
            'title' => $this->resourceTitle,
            'items_per_page' => 15
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->params['filter'] = $request->input('filter');

        $this->params['items'] = Treatment::orderBy('level')->filteredPaginate($this->params['filter'], $this->params['items_per_page']);

        return view($this->routes['index'], $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->params['title'] = 'Nuevo Tratamiento';

        $this->params['levels'] = Treatment::$levels;

        $this->params['types'] = Treatment::$types;

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['create'],
                'title' => $this->params['title']
            ]
        );

        $this->params['action_route'] = $this->routes['store'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TreatmentRequest $request)
    {
        try
        {
            $inputs = $request->all();
            $inputs['short_code'] = $inputs['level'];

            $item = Treatment::create($inputs);
        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear el Tratamiento.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Nueva Tratamiento creado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Treatment::findOrFail($id);

        $this->params['title'] = $item->description;
        $this->params['levels'] = Treatment::$levels;

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $this->params['title']
            ]
        );

        $this->params['item'] = $item;

        return view($this->routes['show'], $this->params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->params['item'] = $item = Treatment::findOrFail($id);

        $this->params['title'] = 'Editar - ' . Treatment::$levels[$item->level] . ' ' . $item->description;

        $this->params['levels'] = Treatment::$levels;

        $this->params['types'] = Treatment::$types;

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['edit'],
                'route_params' => ['id' => $item->id],
                'title' => $this->params['title']
            ]
        );

        $this->params['action_route'] = $this->routes['update'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TreatmentRequest $request, $id)
    {
        $item = Treatment::findOrFail($id);

        try
        {
            $inputs = $request->all();
            $inputs['short_code'] = $inputs['level'];
            $item->update($inputs);
        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar el Tratamiento.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Tratamiento editado exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Treatment::findOrFail($id);

        try
        {
            $row->deleted_by = \Auth::user()->id;
            $row->save();
            $row->delete();
        }
        catch (QueryException $e)
        {
            return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar el Tratamiento.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'El Tratamiento se ha borrado exitosamente.']);
    }
}
