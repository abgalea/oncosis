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

            {{ Form::bsText('Nombre de Usuario', 'username', NULL, ['placeholder' => 'Nombre de Usuario', 'required']) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsText('Email', 'email', NULL, ['placeholder' => 'Email', 'required']) }}

            <div class="hr-line-dashed"></div>      
            <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Rol</label>
                <div class="col-sm-8">
                    <select name="role" class="form-control select2">
                        <option value>Seleccione Rol</option>
                        @foreach( $roles as $r )
                        <option value="{{ $r->id }}" {{ ( isset($item) && ($item->roles->count() > 0) && $item->roles->first()->id == $r->id ) ? 'selected' : '' }}>{{ $r->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>

                
            {{ Form::bsPassword('Contraseña', 'password', NULL, ['placeholder' => 'Contraseña', $required]) }}

            <div class="hr-line-dashed"></div>

            {{ Form::bsPassword('Confirmar contraseña', 'password_confirmation', NULL, ['placeholder' => 'Confirmar contraseña', $required]) }}
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
