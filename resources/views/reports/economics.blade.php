@extends('layouts.resource')

@section('after-css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
@endsection

@section('action-buttons')
    <div class="title-action">
        <form action="{{ route('reports.excel.economics') }}" class="form form-search" role="form" method="GET">
            <input type="hidden" name="insurance_id" {{ isset($filters['insurance_id']) ? 'value='.$filters['insurance_id'] : '' }}>
            <input type="hidden" name="provider_id" {{ isset($filters['provider_id']) ? 'value='.$filters['provider_id'] : '' }}>
            <input type="hidden" name="start_date" {{ (isset($filters) && isset( $filters['start_date']) ) ? 'value='.$filters['start_date'] : '' }}>
            <input type="hidden" name="end_date" {{ (isset($filters) && isset( $filters['end_date']) ) ? 'value='.$filters['end_date'] : '' }}>
            <button type="submit" class="btn btn btn-primary"><i class="fa fa-file-excel-o fa-fw"></i> Exportar Lista</button>
        </form>
    </div>
@endsection

@section('resource-content')

    @section('resource-tabs')
    <div class="row">
        <ul class="nav nav-pills patient-menu">
            {{-- <li role="presentation" @if (isset($current_section) AND $current_section=='reports.patients' ) class="active" @endif><a href="{{ route('reports.patients' ) }}">Listado de Pacientes</a></li> --}}
            <li role="presentation" @if (isset($current_section) AND $current_section=='reports.economics' ) class="active" @endif><a href="{{ route('reports.economics') }}">Reporte Econ&oacute;mico</a></li>
        </ul>
    </div>
    @endsection

    @section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form action="{{ route($routes['economics']) }}" class="form form-search" role="form" method="GET">
                        <div class="row">
                            <div class="col-md-2">
                                {{ Form::select('insurance_id', $insurance_providers, isset($filters['insurance_id']) ? $filters['insurance_id'] : null, ['class' => 'form-control filter-insurance'])}}
                            </div>
                            <div class="col-md-2">
                                {{ Form::select('provider_id', $institutions, isset($filters['provider_id']) ? $filters['provider_id'] : null, ['class' => 'form-control filter-provider'])}}
                            </div>
                            <div class="col-md-4">
                                <?php
                                $btn_dange_range = 'Fechas';

                                if( isset($filters) && isset( $filters['start_date']) && isset( $filters['end_date']) && ( $filters['start_date'] != $filters['end_date'] ) ){
                                    $btn_dange_range = $filters['start_date'] . ' - ' . $filters['end_date'];
                                }

                                if( isset($filters) && isset( $filters['start_date']) && !empty( $filters['start_date'] ) && ( $filters['start_date'] == $filters['end_date'] ) ) {
                                    $btn_dange_range = $filters['start_date'];
                                }
                                ?>
                                <button type="button" id="daterange" class="btn btn-default"><span class="btn-date-range">{{ $btn_dange_range }}</span> <span class="caret"></span></button>
                                <input type="hidden" name="start_date" {{ (isset($filters) && isset( $filters['start_date']) ) ? 'value='.$filters['start_date'] : '' }}>
                                <input type="hidden" name="end_date" {{ (isset($filters) && isset( $filters['end_date']) ) ? 'value='.$filters['end_date'] : '' }}>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn btn-primary btn-block"> <i class="fa fa-search"></i> Buscar</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route($routes['economics']) }}" class="btn btn btn-default btn-block">Resetear</a>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        @if( !$providers->isEmpty() )
                        <table class="table table-hover">
                            @foreach($providers as $provider)

                            <thead>
                                <tr>
                                    <th colspan="4"><h2>{{ $provider['name'] }}<h2></th>
                                    <th style="vertical-align: bottom;" class="text-center">{{ $provider['level_0'] }}</th>
                                    <th style="vertical-align: bottom;" class="text-center">{{ $provider['level_1'] }}</th>
                                    <th style="vertical-align: bottom;" class="text-center">{{ $provider['level_2'] }}</th>
                                    <th style="vertical-align: bottom;" class="text-center">{{ $provider['level_3'] }}</th>
                                    <th style="vertical-align: bottom;" class="text-center">{{ $provider['level_4'] }}</th>
                                    <th style="vertical-align: bottom;" class="text-center">{{ $provider['level_5'] }}</th>
                                    <th style="vertical-align: bottom;" class="text-center">{{ $provider['level_6'] }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Apellido(s)</th>
                                    <th>Nombre(s)</th>
                                    <th>Edad</th>
                                    <th width="40" class="text-center">I</th>
                                    <th width="40" class="text-center">II</th>
                                    <th width="40" class="text-center">III</th>
                                    <th width="40" class="text-center">IV</th>
                                    <th width="40" class="text-center">V</th>
                                    <th width="40" class="text-center">VI</th>
                                    <th width="40" class="text-center">VI</th>
                                    <th class="text-right">Valor $</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($provider['patients'] as $patient)
                                <tr>
                                    <td><a href="{{ route('patients.show', $patient['id']) }}">{{ $patient['id'] }}</a></td>
                                    <td><a href="{{ route('patients.show', $patient['id']) }}">{{ $patient['last_name'] }}</a></td>
                                    <td><a href="{{ route('patients.show', $patient['id']) }}">{{ $patient['first_name'] }}</a></td>
                                    <td>{{ $patient['age'] }} a&ntilde;os</td>
                                    <td width="40" class="text-center">{{ $patient['levels'][0] }}</td>
                                    <td width="40" class="text-center">{{ $patient['levels'][1] }}</td>
                                    <td width="40" class="text-center">{{ $patient['levels'][2] }}</td>
                                    <td width="40" class="text-center">{{ $patient['levels'][3] }}</td>
                                    <td width="40" class="text-center">{{ $patient['levels'][4] }}</td>
                                    <td width="40" class="text-center">{{ $patient['levels'][5] }}</td>
                                    <td width="40" class="text-center">{{ $patient['levels'][6] }}</td>
                                    <td class="text-right">{{ number_format($patient['amount'], 0, '', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">
                            <h4>Lo sentimos</h4>
                            No hay resultados para este criterio de busqueda
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection

@section('after-scripts')
    @parent
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
@endsection

@section('after-script-app')
    @parent
    <script>
    jQuery(function($){
        var today = new Date(Date.now());
        var today_date = (today.getMonth()+1) + '/' + today.getDate() + '/' + today.getFullYear();

        $('#daterange').daterangepicker({
            // opens: "right",
            maxDate: today_date,
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 dias': [moment().subtract(6, 'days'), moment()],
                'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "alwaysShowCalendars": true,
            locale: {
                applyLabel:'Aplicar',
                cancelLabel: 'Cancelar',
                customRangeLabel: 'Otro Rango'
            }
        });

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $("input[name=start_date]").val( picker.startDate.format('DD/MM/YYYY') );
            $("input[name=end_date]").val( picker.endDate.format('DD/MM/YYYY') );

            if( picker.startDate.format('DD/MM/YYYY') == picker.endDate.format('DD/MM/YYYY') )
                $('.btn-date-range').html( picker.startDate.format('DD/MM/YYYY') );
            else
                $('.btn-date-range').html( picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY') );

            // $("#sale_report_form input[type=submit]").prop('disabled', false);

        });

        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $("input[name=start_date]").val('');
            $("input[name=end_date]").val('');
            $(this).val('');

            $('.btn-date-range').html('Fechas')

            // $("#sale_report_form input[type=submit]").prop('disabled', true);
        });

    }).noConflict;
    </script>
@endsection
