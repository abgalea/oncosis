@extends('layouts.resource_patient')

@section('page-title', $title)

@section('after-css-app')
<style type="text/css">
    .form-group .form-show label.control-label {
        font-weight: normal;
    }
</style>
@endsection

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#seguimiento"><i class="fa fa-history fa-fw"></i>Agregar Seguimiento</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="ibox">
                    <div class="ibox-content">
                        @include('patients/_data')
                        <div class="row m-t-sm">
                            <div class="col-xs-12 col-lg-12">
                                {!! Form::model($item, ['method' => 'POST', 'route' => ['patients.background.store', $item->id], 'class' => 'form-horizontal']) !!}
                                    <div>
                                        <button class="btn btn-sm btn-default pull-right m-t-n-xs btn-edit" type="button"><i class="fa fa-pencil fa-fw"></i>Editar Antecedentes</button>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs btn-save hide" type="submit">Guardar</button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cantidad Tabaco</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_cantidad_tabaco }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_cantidad_tabaco', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de Tabaco']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tiempo Tabaco</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_tiempo_tabaco }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_tiempo_tabaco', null, ['class' => 'form-control', 'placeholder' => 'Tiempo Tabaco']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Fumador Pasivo</label>
                                        <div class="col-sm-4">
                                            {!! Form::checkbox('antecedente_fumador_pasivo', 1, null, ['class' => 'js-switch']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cantidad Alcohol</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_cantidad_alcohol }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_cantidad_alcohol', null, ['class' => 'form-control', 'placeholder' => 'Cantidad Alcohol']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tiempo Alcohol</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_tiempo_alcohol }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_tiempo_alcohol', null, ['class' => 'form-control', 'placeholder' => 'Tiempo Alcohol']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Drogas</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_drogas }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_drogas', null, ['class' => 'form-control', 'placeholder' => 'Drogas']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    @if( $item->sex == 'femenino' )
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Menarca</label>
                                        {{--<div class="col-sm-4">
                                             {!! Form::checkbox('antecedente_menarca', 1, null, ['class' => 'js-switch']) !!}
                                        </div> --}}
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_menarca }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_menarca', null, ['class' => 'form-control', 'placeholder' => 'Menarca']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Menospausia</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_menospau }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_menospau', null, ['class' => 'form-control', 'placeholder' => 'Menospausia']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Aborto</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_aborto }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_aborto', null, ['class' => 'form-control', 'placeholder' => 'Aborto']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Embarazo</label>
                                        <div class="col-sm-2">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_embarazo }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_embarazo', null, ['class' => 'form-control', 'placeholder' => 'Embarazo']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Parto</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_parto }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('antecedente_parto', null, ['class' => 'form-control', 'placeholder' => 'Parto']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Lactancia</label>
                                        <div class="col-sm-4">
                                            {!! Form::checkbox('antecedente_lactancia', 1, null, ['class' => 'js-switch']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Anticonceptivos</label>
                                        <div class="col-sm-8 form-show">
                                            <label class="control-label">{{ $item->antecedente_anticonceptivos }} &mdash; {{ $item->antecedente_anticonceptivos_aplicacion }}</label>
                                        </div>
                                        <div class="form-edit hide">
                                            <div class="col-sm-1">
                                                {!! Form::text('antecedente_anticonceptivos', null, ['class' => 'form-control', 'placeholder' => 'Tiempo']) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-edit hide">
                                                    {!! Form::select('antecedente_anticonceptivos_aplicacion', ['Esporádicos' => 'Esporádicos', 'Contínuos' => 'Contínuos', 'Con interrupciones' => 'Con interrupciones'], NULL, ['class' => 'select2', 'placeholder' => 'Anticonceptivos', 'style' => 'width: 100%']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Antecedentes Quirúrgicos</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_quirurgicos }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::textarea('antecedente_quirurgicos', null, ['class' => 'form-control', 'placeholder' => 'Antecedentes Quirúrgicos']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Antecedentes Familiares Oncológicos</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label">{{ $item->antecedente_familiar_oncologico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::textarea('antecedente_familiar_oncologico', null, ['class' => 'form-control', 'placeholder' => 'Antecedentes Familiares Oncológicos']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-default pull-right m-t-n-xs btn-edit" type="button"><i class="fa fa-pencil fa-fw"></i>Editar Antecedentes</button>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs btn-save hide" type="submit">Guardar</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-script-app')
    @parent
    <script>
        jQuery(document).ready(function($) {
            $('button.btn-edit').on('click', function(e) {
                e.preventDefault();
                $('.form-group .form-show').addClass('hide');
                $('.form-group .form-edit').removeClass('hide');
                $('button.btn-save').removeClass('hide');
                $('button.btn-edit').addClass('hide');
            });
        });
    </script>
@endsection
