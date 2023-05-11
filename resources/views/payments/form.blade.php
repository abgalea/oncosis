@extends('layouts.resource')

@section('resource-content')
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>{{ $title }}</h5>
        </div>

        <div class="ibox-content">
            @include('partials/resource_form_single')

            {{ Form::bsSelect2('Obra Social', 'insurance_provider_id', NULL, $providers, ['placeholder' => 'Obra Social', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsDate('Fecha', 'payment_date', NULL, ['placeholder' => 'Fecha', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect2('Período Mes', 'payment_month', NULL, $months, ['placeholder' => 'Período Mes', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect2('Período Año', 'payment_year', NULL, $years, ['placeholder' => 'Período Año', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Total', 'total', NULL, ['placeholder' => 'Total', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsTextArea('Observaciones', 'notes', NULL, ['placeholder' => 'Observaciones']) }}

            <div class="hr-line-dashed"></div>

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
