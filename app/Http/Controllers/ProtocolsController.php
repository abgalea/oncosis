<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Protocol;
use Illuminate\Http\Request;
use App\Http\Requests\ProtocolRequest;

class ProtocolsController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Esquemas';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'protocols',
        'index' => 'protocols.index',
        'store' => 'protocols.store',
        'create' => 'protocols.create',
        'show' => 'protocols.show',
        'destroy' => 'protocols.destroy',
        'update' => 'protocols.update',
        'edit' => 'protocols.edit'
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

        $this->params['items'] = Protocol::orderBy('name')->filteredPaginate($this->params['filter'], $this->params['items_per_page']);

        return view($this->routes['index'], $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['create'],
                'title' => 'Nuevo Esquema'
            ]
        );

        $this->params['title'] = 'Nuevo Esquema';

        $this->params['action_route'] = $this->routes['store'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProtocolRequest $request)
    {
        try
        {
            $item = Protocol::create($request->all());
        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear el Esquema.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Nuevo Esquema creado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Protocol::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->name
            ]
        );

        $this->params['item'] = $item;

        $this->params['title'] = $item->name;

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
        $this->params['item'] = $item = Protocol::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['edit'],
                'route_params' => ['id' => $item->id],
                'title' => 'Editar ' . $item->name
            ]
        );

        $this->params['title'] = 'Editar ' . $item->name;

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
    public function update(ProtocolRequest $request, $id)
    {
        $item = Protocol::findOrFail($id);

        try
        {
            $item->update($request->all());
        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar el Esquema.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Esquema editado exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Protocol::findOrFail($id);

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
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar el Esquema.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'El Esquema se ha borrado exitosamente.']);
    }
}
