@extends('layouts.app')

@section('page-title', 'Inicio')

@section('content')
    <div class="wrapper wrapper-content">
        {{-- <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pagos</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">${{ number_format($total_payments, 0, ',', '.') }}</h1>
                        <small>Recibidos en este periodo</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Órdenes Pagadas</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">${{ number_format($total_unpaid_orders, 0, ',', '.') }}</h1>
                        <small>Pagadas en este período</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Órdenes Pendientes</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">${{ number_format($total_paid_orders, 0, ',', '.') }}</h1>
                        <small>Pendientes en este período</small>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-12">
                <!-- <div class="small pull-left col-md-3 m-l-lg m-t-md">
                    Distribución de pacientes <strong>por edad</strong>
                </div> -->
                <div class="small pull-right col-md-3 m-t-md text-right">
                    Distribución de pacientes <strong>por edad</strong>
                </div>
                <div class="flot-chart m-b-xl">
                    <div class="flot-chart-content" id="flot-dashboard5-chart"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Últimos Pacientes</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover no-margins">
                            <thead>
                                <tr>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Hace</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_patients as $item)
                                <tr>
                                    <td>
                                        <small>
                                            <a href="{{ route('patients.show', [$item->id]) }}">
                                                {{ $item->last_name }}
                                            </a>
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            <a href="{{ route('patients.show', [$item->id]) }}">
                                                {{ $item->first_name }}
                                            </a>
                                        </small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> {{ $item->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tratamientos Activos</h5>
                    </div>
                    <div class="ibox-content">
                        
                        @if (count($recent_treatments) > 0)
                        <div class="table-responsive">
                        <table class="table table-hover no-margins">
                            <thead>
                                <tr>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Tratamiento</th>
                                    <th>Iniciado el</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_treatments as $item)
                                <tr>
                                    <td>
                                        <small>
                                            <a href="{{ route('patients.treatment.show', [$item->patient->id]) }}">
                                                {{ $item->patient->last_name }}
                                            </a>
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            <a href="{{ route('patients.treatment.show', [$item->patient->id]) }}">
                                                {{ $item->patient->first_name }}
                                            </a>
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            <a href="{{ route('patients.treatment.show', [$item->patient->id]) }}">
                                                {{ $item->tratamiento }}
                                            </a>
                                        </small>
                                    </td>
                                    <td>
                                        @if ($item->fecha_inicio)
                                        <i class="fa fa-clock-o"></i> {{ $item->fecha_inicio }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        @else
                        <p>No existen tratamientos activos.</p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tratamientos Cerrados</h5>
                    </div>
                    <div class="ibox-content">
                        @if (count($finished_treatments) > 0)
                        <div class="table-responsive">
                        <table class="table table-hover no-margins">
                            <thead>
                                <tr>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Tratamiento</th>
                                    <th>Finalizado el</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($finished_treatments as $item)
                                <tr>
                                    <td><small>{{ $item->patient->last_name }}</small></td>
                                    <td><small>{{ $item->patient->first_name }} </small></td>
                                    <td><small>{{ $item->tratamiento }} </small></td>
                                    <td>
                                        @if ($item->fecha_fin)
                                        <i class="fa fa-clock-o"></i> {{ $item->fecha_fin }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        @else
                        <p>No existen tratamientos finalizados.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-script-app')
    <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.time.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                        {{ json_encode($patient_age_distribution['data']) }}
                    ],
                    {
                        series: {
                            bars: {
                                show: false
                            },
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            borderWidth: 2,
                            color: 'transparent'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis: {},
                        yaxis: {},
                        tooltip: false
                    }
            );
        });
    </script>
@endsection
