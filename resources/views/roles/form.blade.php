@extends('layouts.resource')

@section('resource-content')
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>{{ $title }}</h5>
        </div>

        <div class="ibox-content">
            @include('partials/resource_form_single')

            {{ Form::bsText('Nombre Corto', 'name', NULL, ['placeholder' => 'Nombre Corto', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Nombre', 'display_name', NULL, ['placeholder' => 'Nombre', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Descripción', 'description', NULL, ['placeholder' => 'Descripción', 'required']) }}
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
