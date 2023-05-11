<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PracticeRequest;

class PracticesController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Prácticas';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'practices',
        'index' => 'practices.index',
        'store' => 'practices.store',
        'create' => 'practices.create',
        'show' => 'practices.show',
        'destroy' => 'practices.destroy',
        'update' => 'practices.update',
        'edit' => 'practices.edit'
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

        $this->params['items'] = Practice::orderBy('short_code')->filteredPaginate($this->params['filter'], $this->params['items_per_page']);

        return view($this->routes['index'], $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->params['title'] = 'Nueva Práctica';

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['create'],
                'title' => $this->params['title']
            ]
        );

        // Levels for Insurance
        $this->params['levels'] = Practice::$levels;
        
        $this->params['action_route'] = $this->routes['store'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PracticeRequest $request)
    {
        try
        {
            $item = Practice::create($request->all());
        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear la Práctica.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Nueva Práctica creada exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Practice::findOrFail($id);

        $this->params['title'] = $item->short_code;

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $this->params['title']
            ]
        );

        // Levels for Insurance
        if( !is_null( $item->level ) )
            $item->level = Practice::$levels[ $item->level ];

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
        $item = Practice::findOrFail($id);
        $item->fee = str_replace(',','.',$item->fee);

        $this->params['item'] = $item;

        $this->params['title'] = 'Editar ' . $item->short_code;

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['edit'],
                'route_params' => ['id' => $item->id],
                'title' => $this->params['title']
            ]
        );

        
        // dd( $this->params['item'] );

        // Levels for Insurance
        $this->params['levels'] = Practice::$levels;

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
    public function update(PracticeRequest $request, $id)
    {
        $item = Practice::findOrFail($id);

        try
        {
            $practice = $request->all();
            $practice['level'] = intval( $practice['level'] );
            // dd( $practice );
            $item->update( $practice );
        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar la Práctica.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Práctica editada exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Practice::findOrFail($id);

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
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar la Práctica.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'La Práctica se ha borrado exitosamente.']);
    }
}
