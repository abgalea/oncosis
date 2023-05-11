@extends('layouts.resource')

@section('resource-content')
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>{{ $title }}</h5>
        </div>

        <div class="ibox-content">
            @include('partials/resource_form_single')

            {{ Form::bsText('Nombre(s)', 'first_name', NULL, ['placeholder' => 'Nombre(s)', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Apellido(s)', 'last_name', NULL, ['placeholder' => 'Apellido(s)', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('DNI', 'id_number', NULL, ['placeholder' => 'DNI', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsDate('Fecha de Nacimiento', 'date_of_birth', NULL, ['placeholder' => 'Fecha de Nacimiento','readonly', 'readonly', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect('Sexo', 'sex', NULL, $sex_values, ['required' => true]) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Dirección', 'address', NULL, ['placeholder' => 'Dirección']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Ciudad', 'city', NULL, ['placeholder' => 'Ciudad']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Provincia/Departamento', 'state', NULL, ['placeholder' => 'Provincia/Departamento']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('País', 'country', NULL, ['placeholder' => 'País']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Teléfono', 'phone_number', NULL, ['placeholder' => 'Teléfono']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Ocupación', 'occupation', NULL, ['placeholder' => 'Ocupación']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsSelect2('Obra Social', 'insurance_provider_id[]', $selected_insurance_providers, $insurance_providers, ['required' => true, 'multiple' => true]) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Nro./Cód. Afiliado', 'insurance_id', NULL, ['placeholder' => 'Nro./Cód. Afiliado', 'required']) }}

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
