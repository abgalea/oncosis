@extends('layouts.resource')

@section('resource-content')
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>{{ $title }}</h5>
        </div>

        <div class="ibox-content">
            @include('partials/resource_form_single')

            {{ Form::bsSelect2('Proveedor', 'provider_id', NULL, $providers, ['placeholder' => 'Proveedor', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Nombre', 'name', NULL, ['placeholder' => 'Nombre', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Coseguro', 'percentage', NULL, ['placeholder' => 'Coseguro', 'required']) }}

            <div class="hr-line-dashed"></div>

            <div class="form-group">
                {!! Form::label('level', 'Nivel', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <div class="input-group" style="margin-bottom:5px">
                        <span class="input-group-addon" style="width: 80px; text-align:left;">Nivel I</span>
                        {!! Form::number('level_0', null, ['class' => 'form-control', 'placeholder' => 'Precio', 'step' => '0.01', 'required']) !!}
                    </div>
                    <div class="input-group" style="margin-bottom:5px">
                        <span class="input-group-addon" style="width: 80px; text-align:left;">Nivel II</span>
                        {!! Form::number('level_1', null, ['class' => 'form-control', 'placeholder' => 'Precio', 'step' => '0.01', 'required']) !!}
                    </div>
                    <div class="input-group" style="margin-bottom:5px">
                        <span class="input-group-addon" style="width: 80px; text-align:left;">Nivel III</span>
                        {!! Form::number('level_2', null, ['class' => 'form-control', 'placeholder' => 'Precio', 'step' => '0.01', 'required']) !!}
                    </div>
                    <div class="input-group" style="margin-bottom:5px">
                        <span class="input-group-addon" style="width: 80px; text-align:left;">Nivel IV</span>
                        {!! Form::number('level_3', null, ['class' => 'form-control', 'placeholder' => 'Precio', 'step' => '0.01', 'required']) !!}
                    </div>
                    <div class="input-group" style="margin-bottom:5px">
                        <span class="input-group-addon" style="width: 80px; text-align:left;">Nivel V</span>
                        {!! Form::number('level_4', null, ['class' => 'form-control', 'placeholder' => 'Precio', 'step' => '0.01', 'required']) !!}
                    </div>
                    <div class="input-group" style="margin-bottom:5px">
                        <span class="input-group-addon" style="width: 80px; text-align:left;">Nivel VI</span>
                        {!! Form::number('level_5', null, ['class' => 'form-control', 'placeholder' => 'Precio', 'step' => '0.01', 'required']) !!}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" style="width: 80px; text-align:left;">Nivel VII</span>
                        {!! Form::number('level_6', null, ['class' => 'form-control', 'placeholder' => 'Precio', 'step' => '0.01', 'required']) !!}
                    </div>
                </div>
            </div>

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
