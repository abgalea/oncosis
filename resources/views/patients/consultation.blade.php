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
                                @if (count($item->consultations) > 0)
                                    @foreach($item->consultations as $patientConsultation)
                                {!! Form::model($patientConsultation, ['method' => 'PUT', 'route' => ['patients.consultation.update', $patientConsultation->id], 'class' => 'form-horizontal']) !!}
                                <div id="consultation-{{ $patientConsultation->id }}" class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h3 class="panel-title">{{ $patientConsultation->consulta_fecha->format('d/m/Y') }}</h3>
                                        </div>
                                        <div class="pull-right">
                                            Última modificación: {{ $patientConsultation->updated_at->format('d/m/Y') }} |
                                            por {{ $patientConsultation->updatedby->first_name }} {{ $patientConsultation->updatedby->last_name }} |
                                            Estado:
                                            @if ($patientConsultation->consulta_pagada)
                                            <span class="label label-success">PAGADO</span>
                                            @else
                                            <span class="label label-warning">PENDIENTE</span>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-show">
                                                    <strong>Tipo:</strong>
                                                    <br />
                                                    {{ strtoupper( str_replace( 'Consulta ', '', $patientConsultation->treatment->description )) }}
                                                    {{--  @if ($patientConsultation->consulta_tipo == 'RECAIDA')
                                                    <span class="label recaida">RECAIDA</span>
                                                    @else
                                                    {{ $patientConsultation->consulta_tipo }}
                                                    @endif  --}}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Tipo</label>
                                                    <br>
                                                    <label class="radio-inline">
                                                        {!! Form::radio('consulta_tipo', 'SEGUIMIENTO', ($patientConsultation->consulta_tipo == 'SEGUIMIENTO'), []) !!} Seguimiento
                                                    </label>
                                                    <label class="radio-inline">
                                                        {!! Form::radio('consulta_tipo', 'PRIMERA VEZ', ($patientConsultation->consulta_tipo == 'PRIMERA VEZ'), []) !!} Primera Vez
                                                    </label>
                                                    <label class="radio-inline">
                                                        {!! Form::radio('consulta_tipo', 'RECAIDA', ($patientConsultation->consulta_tipo == 'RECAIDA'), []) !!} Recaida
                                                    </label>
                                                </div>
                                                <br />
                                                <div class="form-show">
                                                    @if( isset( $patientConsultation->provider ) )
                                                    <strong>Institución:</strong>
                                                    <br />
                                                    {{ $patientConsultation->provider->name }}
                                                    @endif
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Institución</label>
                                                    {!! Form::select('provider_id', $selectors['providers'], null, ['class' => 'form-control', 'placeholder' => 'Institución']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <div class="form-show">
                                                            <strong>Resumen:</strong>
                                                            <br />
                                                            {!! nl2br($patientConsultation->consulta_resumen) !!}
                                                            <br />
                                                        </div>
                                                        <div class="form-edit hide">
                                                            <label class="control-label">Resumen</label>
                                                            {!! Form::textarea('consulta_resumen', $patientConsultation->consulta_resumen, ['class' => 'form-control redactor', 'placeholder' => 'Resumen']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <div class="form-show">
                                                            <strong>Peso:</strong> {{ $patientConsultation->consulta_peso }}
                                                        </div>
                                                        <div class="form-edit hide">
                                                            <label class="control-label">Peso</label>
                                                            {!! Form::text('consulta_peso', $patientConsultation->consulta_peso, ['class' => 'form-control', 'placeholder' => 'Peso']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <div class="form-show">
                                                            <strong>Altura:</strong> {{ $patientConsultation->consulta_altura }}
                                                        </div>
                                                        <div class="form-edit hide">
                                                            <label class="control-label">Altura</label>
                                                            {!! Form::text('consulta_altura', $patientConsultation->consulta_altura, ['class' => 'form-control', 'placeholder' => 'Altura']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <div class="form-show">
                                                            <strong>Sup. Corp.:</strong> {{ number_format((float)$patientConsultation->consulta_superficie_corporal, 2) }}
                                                        </div>
                                                        <div class="form-edit hide">
                                                            <label class="control-label">Sup. Corp.</label>
                                                            {!! Form::text('consulta_superficie_corporal', $patientConsultation->fisico_superficie_corporal, ['class' => 'form-control', 'placeholder' => 'Sup. Corp.', 'disabled' => 'disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <div class="form-show">
                                                            <strong>Presión Art.:</strong> {{ $patientConsultation->consulta_presion_arterial }}
                                                        </div>
                                                        <div class="form-edit hide">
                                                            <label class="control-label">Presión Art.</label>
                                                            {!! Form::text('consulta_presion_arterial', $patientConsultation->consulta_presion_arterial, ['class' => 'form-control', 'placeholder' => 'Presión Art.']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right form-group">
                                                <button class="btn btn-default" @click.prevent="borrarConsulta({{ $patientConsultation->id }})"><i class="fa fa-times fa-fw"></i>Borrar</button>
                                                <button class="btn btn-default btn-edit" data-id="{{ $patientConsultation->id }}"><i class="fa fa-pencil-square-o fa-fw"></i>Editar</button>
                                                <button class="btn btn-default btn-save hide" type="submit" data-id="{{ $patientConsultation->id }}"><i class="fa fa-floppy-o fa-fw"></i>Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                    @endforeach
                                @else
                                <p>No existen consultas registradas para este paciente.</p>
                                @endif
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
                var containerId = '#consultation-' + $(this).data('id');
                var container = $(containerId);
                if (container.length > 0) {
                    $(containerId + ' .form-show').addClass('hide');
                    $(containerId + ' .form-edit').removeClass('hide');
                    $(containerId + ' button.btn-save').removeClass('hide');
                    $(containerId + ' button.btn-edit').addClass('hide');
                }
            });

            if( $('.redactor').size() > 0 ){
                $('.redactor').redactor({
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
