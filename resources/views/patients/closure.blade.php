@extends('layouts.resource_patient')

@section('page-title', $title)

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
                                {!! Form::open(['method' => 'POST', 'route' => ['patients.closure.store', $item->id], 'class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Fecha Muerte</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                {!! Form::text('fecha_muerte', $item->fecha_muerte, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha Muerte', 'data-date-start-date' => '']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Causa de la Muerte</label>
                                        <div class="col-sm-8">
                                            {!! Form::textarea('causa_de_muerte', $item->causa_de_muerte, ['class' => 'form-control', 'placeholder' => 'Causa de la Muerte']) !!}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Fecha Respuesta Completa</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                {!! Form::text('fecha_respuesta_completa', $item->fecha_respuesta_completa, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha Respuesta Completa']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Guardar</strong></button>
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
