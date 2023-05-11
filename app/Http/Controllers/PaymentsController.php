<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\InsuranceProvider;
use App\Http\Requests\PaymentRequest;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Pagos';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'payments',
        'index' => 'payments.index',
        'store' => 'payments.store',
        'create' => 'payments.create',
        'show' => 'payments.show',
        'destroy' => 'payments.destroy',
        'update' => 'payments.update',
        'edit' => 'payments.edit'
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

        $this->params['items'] = Payment::with(['insurance_provider'])
            ->where('payment_year', $this->params['current_year'])
            ->where('payment_month', $this->params['current_month'])
            ->orderBy('payment_date', 'desc')
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
                'title' => 'Nuevo Pago'
            ]
        );

        $this->params['title'] = 'Nuevo Pago';

        $this->params['providers'] = InsuranceProvider::active()->orderBy('name')->lists('name', 'id');

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
    public function store(PaymentRequest $request)
    {
        try
        {
            $item = Payment::create($request->all());
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
        $item = Payment::with(['insurance_provider'])->findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => 'Pago ' . $item->id
            ]
        );

        $this->params['item'] = $item;

        $this->params['title'] = 'Pago ' . $item->id;

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
        $this->params['item'] = $item = Payment::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['edit'],
                'route_params' => ['id' => $item->id],
                'title' => 'Editar Pago'
            ]
        );

        $this->params['title'] = 'Editar Pago';

        $this->params['action_route'] = $this->routes['update'];

        $this->params['providers'] = InsuranceProvider::active()->orderBy('name')->lists('name', 'id');

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
    public function update(PaymentRequest $request, $id)
    {
        $item = Payment::findOrFail($id);
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
        $row = Payment::findOrFail($id);

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
