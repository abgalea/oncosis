<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Http\Requests;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Roles';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'roles',
        'index' => 'roles.index',
        'store' => 'roles.store',
        'create' => 'roles.create',
        'show' => 'roles.show',
        'destroy' => 'roles.destroy',
        'update' => 'roles.update',
        'edit' => 'roles.edit',
        'permissions' => 'roles.permissions'
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

        $this->params['items'] = Role::orderBy('name')->filteredPaginate($this->params['filter'], $this->params['items_per_page']);

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
                'title' => 'Nuevo Rol'
            ]
        );

        $this->params['title'] = 'Nuevo Rol';

        $this->params['action_route'] = $this->routes['store'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $item = Role::create($request->all());
        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear el Rol.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Nuevo Rol creado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Role::findOrFail($id);

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
        $this->params['item'] = $item = Role::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        $item = Role::findOrFail($id);

        try
        {
            $inputs = $request->all();
            $item->update( $request->only(['name', 'display_name', 'description'] ) );

        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar el Rol.']);
        }

        return redirect()->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'Rol editado exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Role::findOrFail($id);

        try
        {
            $row->delete();
        }
        catch (QueryException $e)
        {
            return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar el Rol.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'El Rol se ha borrado exitosamente.']);
    }

    /**
     * Permissions form
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permissions($id)
    {
        $this->params['item'] = $item = Role::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['permissions'],
                'route_params' => ['id' => $item->id],
                'title' => 'Permisos para ' . $item->name
            ]
        );

        $this->params['title'] = 'Permisos para ' . $item->name;

        $this->params['action_route'] = $this->routes['update'];

        return view($this->routes['base'] . '.form', $this->params);
    }
}
