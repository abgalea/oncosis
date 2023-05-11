<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Order;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Órdenes';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'orders',
        'index' => 'orders.index',
        'store' => 'orders.store',
        'create' => 'orders.create',
        'show' => 'orders.show',
        'destroy' => 'orders.destroy',
        'update' => 'orders.update',
        'edit' => 'orders.edit'
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

        $paid = [
            1 => 'Pagado',
            0 => 'Pendiente'
        ];
        $this->params['paid'] = $paid;
        $this->params['current_paid'] = ($request->has('paid')) ? (int)$request->get('paid') : 0;

        $months = [];
        foreach(range(1, 12) as $month)
        {
            $months[$month] = $month;
        }
        $this->params['months'] = $months;
        $this->params['current_month'] = ($request->has('month')) ? $request->get('month') : date('n');

        $years = [];
        foreach(range(date('Y') - 1, date('Y') + 2) as $year)
        {
            $years[$year] = $year;
        }
        $this->params['years'] = $years;
        $this->params['current_year'] = ($request->has('year')) ? $request->get('year') : date('Y');

        $this->params['items'] = Order::with(['provider', 'practice'])
            ->where('period_year', $this->params['current_year'])
            ->where('period_month', $this->params['current_month'])
            ->where('paid', (boolean)$this->params['current_paid'])
            ->orderBy('order_date', 'desc')
            ->filteredPaginate($this->params['filter'], $this->params['items_per_page']);

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
                'title' => 'Nueva Órden'
            ]
        );

        $this->params['title'] = 'Nueva Órden';

        $this->params['providers'] = Provider::active()->orderBy('name')->lists('name', 'id');

        $this->params['practices'] = Practice::active()
            ->selectRaw('CONCAT(short_code, \' - \', description) AS name, id')
            ->orderBy('name')
            ->lists('name', 'id');

        $months = [];
        foreach(range(1, 12) as $month)
        {
            $months[$month] = $month;
        }
        $this->params['months'] = $months;

        $years = [];
        foreach(range(date('Y') - 1, date('Y') + 2) as $year)
        {
            $years[$year] = $year;
        }
        $this->params['years'] = $years;

        $this->params['action_route'] = $this->routes['store'];

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        try
        {
            $item = Order::create($request->all());
        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear la Órden.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Nueva Órden creada exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Order::with(['provider', 'practice'])->findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => 'Órden ' . $item->id
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
        $this->params['item'] = $item = Order::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['edit'],
                'route_params' => ['id' => $item->id],
                'title' => 'Editar Órden'
            ]
        );

        $this->params['title'] = 'Editar Órden';

        $this->params['action_route'] = $this->routes['update'];

        $this->params['providers'] = Provider::active()->orderBy('name')->lists('name', 'id');

        $this->params['practices'] = Practice::active()
            ->selectRaw('CONCAT(short_code, \' - \', description) AS name, id')
            ->orderBy('name')
            ->lists('name', 'id');

        $months = [];
        foreach(range(1, 12) as $month)
        {
            $months[$month] = $month;
        }
        $this->params['months'] = $months;

        $years = [];
        foreach(range(date('Y') - 1, date('Y') + 2) as $year)
        {
            $years[$year] = $year;
        }
        $this->params['years'] = $years;

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $item = Order::findOrFail($id);
        try
        {
            $item->update($request->all());
        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar la Órden.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Órden editada exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Order::findOrFail($id);

        try
        {
            $row->delete();
        }
        catch (QueryException $e)
        {
            return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar la Órden.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'La Órden se ha borrado exitosamente.']);
    }
}
