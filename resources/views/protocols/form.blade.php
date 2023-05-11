@extends('layouts.resource')

@section('resource-content')
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>{{ $title }}</h5>
        </div>

        <div class="ibox-content">
            @include('partials/resource_form_single')

            {{ Form::bsText('Nombre', 'name', NULL, ['placeholder' => 'Nombre', 'required']) }}

            <div class="hr-line-dashed"></div>

            <div class="form-group required {{ ($errors->has('instructions')) ? 'has-error' : '' }}">
                {!! Form::label('instructions', 'Instrucciones', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('instructions', null, ['class' => 'form-control', 'rows' => 20]) !!}
                    @if ($errors->has('instructions'))
                        @foreach($errors->get('instructions') as $message)
                            <span class="help-block">{{ $message }}</span>
                        @endforeach
                    @endif
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

@section('after-script-app')
    @parent
    <script>
        jQuery(document).ready(function($) {
            if ($('#instructions').size() > 0) {


                $('#instructions').redactor({
                    minHeight: 300,
                    buttons: ['formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'outdent', 'indent', 'image', 'file', 'link', 'alignment', 'horizontalrule', 'html'],
                    plugins: ['instructions'],
                    lang: 'es_ar',
                    convertLinks: true
                });
            }
        });
    </script>
@endsection
