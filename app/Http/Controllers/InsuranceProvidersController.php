<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Models\InsuranceProvider;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceProviderRequest;

class InsuranceProvidersController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Obras Sociales';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'insurance_providers',
        'index' => 'insurance_providers.index',
        'store' => 'insurance_providers.store',
        'create' => 'insurance_providers.create',
        'show' => 'insurance_providers.show',
        'destroy' => 'insurance_providers.destroy',
        'update' => 'insurance_providers.update',
        'edit' => 'insurance_providers.edit'
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

        $this->params['items'] = InsuranceProvider::with('provider')->orderBy('name')->filteredPaginate($this->params['filter'], $this->params['items_per_page']);

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
                'title' => 'Nueva Obra Social'
            ]
        );

        $this->params['title'] = 'Nueva Obra Social';

        $this->params['providers'] = Provider::orderBy('name')->lists('name', 'id');

        $this->params['action_route'] = $this->routes['store'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceProviderRequest $request)
    {
        try
        {
            $item = InsuranceProvider::create($request->all());
        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear la Obra Social.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Nueva Obra Social creado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = InsuranceProvider::with('provider')->findOrFail($id);

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
        $this->params['item'] = $item = InsuranceProvider::findOrFail($id);

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

        $this->params['providers'] = Provider::orderBy('name')->lists('name', 'id');

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsuranceProviderRequest $request, $id)
    {
        $item = InsuranceProvider::findOrFail($id);
        try
        {
            $item->update($request->all());
        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar la Obra Social.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Obra Social editada exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = InsuranceProvider::findOrFail($id);

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
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar la Obra Social.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'La Obra Social se ha borrado exitosamente.']);
    }
}
