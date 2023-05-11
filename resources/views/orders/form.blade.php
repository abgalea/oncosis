@extends('layouts.resource')

@section('resource-content')
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>{{ $title }}</h5>
        </div>

        <div class="ibox-content">
            @include('partials/resource_form_single')

            {{ Form::bsDate('Fecha Orden', 'order_date', NULL, ['placeholder' => 'Fecha Orden', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect2('Período Mes', 'period_month', NULL, $months, ['placeholder' => 'Período Mes', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect2('Período Año', 'period_year', NULL, $years, ['placeholder' => 'Período Año', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect2('Obra Social', 'provider_id', NULL, $providers, ['placeholder' => 'Obra Social', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect2('Práctica', 'practice_id', NULL, $practices, ['placeholder' => 'Práctica', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsNumber('Cantidad', 'quantity', NULL, ['placeholder' => 'Cantidad', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Total', 'total', NULL, ['placeholder' => 'Total', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Función', 'funcion', NULL, ['placeholder' => 'Función']) }}

            <div class="hr-line-dashed"></div>

            @if (isset($item))
            <div class="form-group">
                <label class="col-sm-2 control-label">Pagado?</label>
                <div class="col-sm-10">
                    <div>
                        <label>
                            {{ Form::radio('paid', 1, null) }} Sí
                        </label>
                    </div>
                    <div>
                        <label>
                            {{ Form::radio('paid', 0, null) }} No
                        </label>
                    </div>
                </div>
            </div>

            <div class="hr-line-dashed"></div>

            @endif

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <a class="btn btn-default" href="{{ route($routes['index']) }}">Cancelar</a>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
