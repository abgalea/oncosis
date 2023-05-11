@extends('layouts.resource')

@section('resource-content')
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>{{ $title }}</h5>
        </div>

        <div class="ibox-content">
            @include('partials/resource_form_single')

            {{ Form::bsText('Código Práctica', 'short_code', NULL, ['placeholder' => 'Código Práctica', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Descripción', 'description', NULL, ['placeholder' => 'Descripción', 'required']) }}

            <div class="hr-line-dashed"></div>
            {{ Form::bsSelect2('Nivel', 'level', NULL, $levels, ['placeholder' => 'Nivel', 'required']) }}

            {{ Form::bsNumber('Honorario', 'fee', NULL, ['placeholder' => 'Honorario', 'step' => '0.01', 'required']) }}

            <div class="hr-line-dashed"></div>

            @if (isset($item))
            <div class="form-group">
                <label class="col-sm-2 control-label">Activo?</label>
                <div class="col-sm-10">
                    <div>
                        <label>
                            {{ Form::radio('is_active', 1, null) }} Sí
                        </label>
                    </div>
                    <div>
                        <label>
                            {{ Form::radio('is_active', 0, null) }} No
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
