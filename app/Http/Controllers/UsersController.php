<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Usuarios';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'users',
        'index' => 'users.index',
        'store' => 'users.store',
        'create' => 'users.create',
        'show' => 'users.show',
        'destroy' => 'users.destroy',
        'update' => 'users.update',
        'edit' => 'users.edit'
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

        $this->params['items'] = User::orderBy('last_name')->orderBy('first_name')->filteredPaginate($this->params['filter'], $this->params['items_per_page']);

        return view($this->routes['index'], $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->params['title'] = 'Nuevo Usuario';

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['create'],
                'title' => $this->params['title']
            ]
        );

        $this->params['roles'] = Role::orderBy('id', 'ASC')->get();

        $this->params['required'] = 'required';
        $this->params['action_route'] = $this->routes['store'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try
        {
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $item = User::create($data);

            $item->attachRole($data['role']);

        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear el Usuario.']);
        }

        return redirect()->route($this->routes['index'] )
                ->withMessages(['type' => 'success', 'text' => 'Nuevo Usuario creado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::findOrFail($id);

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

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
        $this->params['item'] = $item = User::findOrFail($id);

        $this->params['title'] = 'Editar ' . $item->first_name . ' ' . $item->last_name;

        $this->params['roles'] = Role::orderBy('id', 'ASC')->get();

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['edit'],
                'route_params' => ['id' => $item->id],
                'title' => $this->params['title']
            ]
        );

        $this->params['action_route'] = $this->routes['update'];
        $this->params['required'] = '';

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $item = User::findOrFail($id);

        try
        {

            $data = $request->all();

            if( isset( $data['password'] ) && ($data['password'] == $data['password_confirmation'] ) )
                $data['password'] = bcrypt($data['password']);
            else {
                return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No coinciden las nuevas contraseñas.']);
            }



            $role = Role::findOrFail( $data['role']);

            $data['position'] = $role->display_name;

            $item->update($data);

            if( $item->roles->count() > 0 ) {
                // check if user already has this role
                if( isset( $role ) && !$item->hasRole( $role ) ){
                    $item->detachRole($item->roles()->first());
                    $item->attachRole($data['role']);
                }
            } else {
                $item->attachRole($data['role']);
            }

            $item->push();

        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar el Usuario.']);
        }

        return redirect()->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'Usuario editado exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = User::findOrFail($id);

        try
        {
            $row->delete();
        }
        catch (QueryException $e)
        {
            return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar el Usuario.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'El Usuario se ha borrado exitosamente.']);
    }
}
