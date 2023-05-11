@extends('layouts.resource_patient')

@section('page-title', $title)

@section('resource-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="ibox">
                    <div class="ibox-content">
                        @include('patients/_data')
                        <div class="row m-t-sm">
                            <div class="col-xs-12 col-lg-12">
                                @if (count($item->treatments) > 0)
                                    @foreach($item->treatments as $patient_treatment)


                                {!! Form::model($patient_treatment, ['method' => 'PUT', 'route' => ['patients.treatment.update', $patient_treatment->id], 'class' => 'form-horizontal']) !!}
                                <div id="treatment-{{ $patient_treatment->id }}" class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h3 class="panel-title">{{ $patient_treatment->tratamiento }} {!! ($patient_treatment->protocol->id != 0 ? '<label for="" class="badge badge-info">'.$patient_treatment->protocol->name.'</label>' : '' ) !!}</h3>
                                            <input type="hidden" name="tratamiento" value="{{ $patient_treatment->tratamiento }}">
                                        </div>
                                        <div class="pull-right">
                                            @if( $patient_treatment->tratamiento != 'CIRUGIA' )
                                            <a class="btn btn-info btn-xs btn-treatment" data-toggle="modal" data-target="#display-protocol" data-treatment='{!! collect(['protocol' => str_replace(['@{{', '}}'], ['[[', ']]'], str_replace("'","", $patient_treatment->protocol->instructions)), 'instrucciones' => str_replace("'","", $patient_treatment->instrucciones), 'protocol_name' => str_replace("'","", $patient_treatment->protocol->name ), 'treatment_id' => $patient_treatment->id, 'updatedby' => Auth::user()->id ]) !!}' href="#">Ver Esquema</a> |
                                            @endif
                                            Última modificación: {{ date(('d/m/Y'), strtotime($patient_treatment->updated_at)) }} |
                                            por {{ $patient_treatment->updatedby->first_name }} {{ $patient_treatment->updatedby->last_name }} |
                                            Estado:
                                            @if ($patient_treatment->estado == 'activo')
                                            <span class="label label-success">ACTIVO</span>
                                            @endif
                                            @if ($patient_treatment->estado == 'cerrado')
                                            <span class="label label-warning">CERRADO</span>
                                            @endif
                                            @if ($patient_treatment->estado == 'cancelado')
                                            <span class="label label-danger">CANCELADO</span>
                                            @endif
                                            @if ($patient_treatment->recaida)
                                            <span class="label label-danger">RECAIDA</span>
                                            @endif

                                            @if ($patient_treatment->treatment_id == 10 && $patient_treatment->rc)
                                            <span class="label label-warning">RC</span>
                                            @endif

                                            @if ($patient_treatment->treatment_id == 10 && $patient_treatment->rp)
                                            <span class="label label-warning">RP</span>
                                            @endif

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-show">
                                                    <strong>Fecha Inicio:</strong> {{ $patient_treatment->fecha_inicio }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Fecha Inicio</label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        {!! Form::text('fecha_inicio', $patient_treatment->fecha_inicio, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha Inicio']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <div class="form-show">
                                                    <strong>Fecha Fin:</strong> {{ ($patient_treatment->fecha_fin) ? $patient_treatment->fecha_fin : 'N/D' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Fecha Fin</label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        {!! Form::text('fecha_fin', ($patient_treatment->fecha_fin) ? $patient_treatment->fecha_fin : null, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha Fin']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-show" style="margin-bottom: 15px">

                                                    <strong>Institución:</strong>
                                                    <br />
                                                    @if( isset( $patient_treatment->provider ) )
                                                    {{ $patient_treatment->provider->name }}
                                                    @endif
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Institución</label>
                                                    {!! Form::select('provider_id', $selectors['providers'], null, ['class' => 'form-control', 'placeholder' => 'Institución', 'style' => 'margin-bottom:15px']) !!}
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <strong>Localización/Patología:</strong> {{ $patient_treatment->pathology_location->pathology->name }} {{ $patient_treatment->pathology_location->tipo }}
                                            </div>
                                            @if( $patient_treatment->tratamiento != 'CIRUGIA' )
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>Ciclos:</strong> {{ $patient_treatment->ciclos }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Ciclos</label>
                                                    {!! Form::text('ciclos', null, ['class' => 'form-control', 'placeholder' => 'Ciclos']) !!}
                                                </div>
                                            </div>
                                            @endif
                                            <br />
                                        </div>
                                        @if ($patient_treatment->tratamiento == 'RADIOTERAPIA')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-show">
                                                    <strong>Dosis diaria:</strong> {{ $patient_treatment->dosis_diaria }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Dosis diaria</label>
                                                    {!! Form::text('dosis_diaria', null, ['class' => 'form-control', 'placeholder' => 'Dosis diaria']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <div class="form-show">
                                                    <strong>Dosis total:</strong> {{ $patient_treatment->dosis_total }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Dosis total</label>
                                                    {!! Form::text('dosis_total', null, ['class' => 'form-control', 'placeholder' => 'Dosis total']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <div class="form-show">
                                                    <strong>Boost:</strong> {{ $patient_treatment->boost }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Boost</label>
                                                    {!! Form::text('boost', null, ['class' => 'form-control', 'placeholder' => 'Boost']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-show">
                                                    <strong>Braquiterapia?:</strong> {{ ($patient_treatment->braquiterapia) ? 'Si' : 'No' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Braquiterapia?</label>
                                                    {!! Form::text('braquiterapia', null, ['class' => 'form-control', 'placeholder' => 'Braquiterapia?']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <div class="form-show">
                                                    <strong>Dosis:</strong> {{ $patient_treatment->dosis }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Dosis</label>
                                                    {!! Form::text('dosis', null, ['class' => 'form-control', 'placeholder' => 'Dosis']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($patient_treatment->tratamiento == 'DROGAS TARGET')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-show">
                                                    <strong>Dosis diaria:</strong> {{ $patient_treatment->dosis_diaria }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Dosis diaria</label>
                                                    {!! Form::text('dosis_diaria', null, ['class' => 'form-control', 'placeholder' => 'Dosis diaria']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <div class="form-show">
                                                    <strong>Frecuencia:</strong> {{ $patient_treatment->frecuencia }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Frecuencia</label>
                                                    {!! Form::text('frecuencia', null, ['class' => 'form-control', 'placeholder' => 'Frecuencia']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-show">
                                                    <strong>Detalle</strong>
                                                    <br>
                                                    {!! nl2br($patient_treatment->observaciones) !!}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Detalle</label>
                                                    {!! Form::textarea('observaciones', null, ['class' => 'form-control redactor', 'placeholder' => 'Detalle']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="btn-toolbar" style="margin-top:20px;">
                                                    @if ($patient_treatment->estado == 'activo')

                                                        <a class="btn btn-default" data-id="{{ $patient_treatment->id }}" data-toggle="modal" data-target="#treatment-log"><i class="fa fa-check-circle-o fa-fw"></i>Registrar Aplicaci&oacute;n</a>
                                                        <a class="btn btn-default" data-id="{{ $patient_treatment->id }}" data-toggle="modal" data-target="#cancel-treatment"><i class="fa fa-stop fa-fw"></i>Cancelar Tratamiento</a>
                                                        <a class="btn btn-default" data-id="{{ $patient_treatment->id }}" data-toggle="modal" data-target="#finish-treatment"><i class="fa fa-compress fa-fw"></i>Fin de Tratamiento</a>

                                                    @endif

                                                        <button class="btn btn-default hidden" data-id="{{ $patient_treatment->id }}"><i class="fa fa-stop fa-fw"></i>Cancelar</button>

                                                        <button class="btn btn-danger" @click.prevent="borrarTratamiento({{ $patient_treatment->id }})"><i class="fa fa-times fa-fw"></i>Borrar</button>



                                                        @if ($patient_treatment->estado == 'activo')
                                                        <button class="btn btn-warning btn-edit" data-id="{{ $patient_treatment->id }}"><i class="fa fa-pencil-square-o fa-fw"></i>Editar</button>
                                                        @endif

                                                        <a data-toggle="modal" data-target="#printTreatmentOnlyModal" class="btn btn-default" data-treatment="{{ $patient_treatment->id}}" data-patient="{{$item->id}}" ><i class="fa fa-print fa-fw"></i>Imprimir</a>

                                                        <button class="btn btn-default btn-cancel hide" type="button" data-id="{{ $patient_treatment->id }}"><i class="fa fa-times-circle-o fa-fw"></i>Cancelar</button>
                                                        <button class="btn btn-success btn-save hide" type="submit" data-id="{{ $patient_treatment->id }}"><i class="fa fa-floppy-o fa-fw"></i>Guardar</button>

                                                        {{-- <div class="btn-group">
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-print fa-fw"></i> Imprimir <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="{{ route('patients.treatment-only.pdf', [$item->id, $patient_treatment->id]) }}"><i class="fa fa-print fa-fw"></i> Imprimir Todo</a></li>
                                                                @if( $patient_treatment->tratamiento != 'CIRUGIA' )
                                                                <li><a href="{{ route('patients.treatment-protocol.pdf', [$item->id, $patient_treatment->id]) }}"><i class="fa fa-server fa-fw"></i> Imprimir Esquema</a></li>
                                                                @endif
                                                            </ul>
                                                        </div> --}}

                                                </div>
                                            </div>
                                        </div>
                                        @if (count($patient_treatment->logs) > 0)
                                        <hr>
                                        <h3 class="panel-title">Histórico</h3>
                                        @foreach($patient_treatment->logs as $log)

                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>Iniciado</strong>: {{ $log->getFormatedDate()->format('d/m/Y') }}
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <strong>Hora</strong>: {{ $log->getFormatedDate()->format('h:i a') }}
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <strong>Por</strong>: {{ $log->createdby->first_name }} {{ $log->createdby->last_name }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <strong>Ciclo</strong>: {{ $log->ciclo }}
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <strong>Toxicidad</strong>: {{ $log->toxicidad }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <strong>Tensión arterial</strong>: {{ $log->tension_arterial }}
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <strong>Frecuencia Cardíaca</strong>: {{ $log->frecuencia_cardiaca }}
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <strong>Peso</strong>: {{ $log->peso }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <strong>Observaciones</strong>
                                                        <br>
                                                        {!! nl2br($log->observaciones) !!}
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                    @endforeach
                                @else
                                <p>No existen tratamientos registrados para este paciente.</p>
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
        var treatmentLogPostRoute = '{{ route('patient.treatments.store', ['id']) }}';
        $(document).ready(function() {
            $('button.btn-edit').on('click', function(e) {
                e.preventDefault();
                var containerId = '#treatment-' + $(this).data('id');
                var container = $(containerId);
                if (container.length > 0) {
                    $(containerId + ' .form-show').addClass('hide');
                    $(containerId + ' .form-edit').removeClass('hide');
                    $(containerId + ' button.btn-save').removeClass('hide');
                    $(containerId + ' button.btn-cancel').removeClass('hide');
                    $(containerId + ' button.btn-edit').addClass('hide');
                }
            });

            $('button.btn-cancel').on('click', function(e) {
                e.preventDefault();
                var containerId = '#treatment-' + $(this).data('id');
                var container = $(containerId);
                if (container.length > 0) {
                    $(containerId + ' .form-show').removeClass('hide');
                    $(containerId + ' .form-edit').addClass('hide');
                    $(containerId + ' button.btn-save').addClass('hide');
                    $(containerId + ' button.btn-cancel').addClass('hide');
                    $(containerId + ' button.btn-edit').removeClass('hide');
                }
            });

            $('#printTreatmentOnlyModal').on('show.bs.modal', function(e){
                var treatment = $(e.relatedTarget).data('treatment');
                var patient = $(e.relatedTarget).data('patient');

                $('input[name="pt_patient"]').val(patient);
                $('input[name="pt_treatment"]').val(treatment);
            })

            $('#display-protocol').on('show.bs.modal', function(e) {
                // e.preventDefault();
                var treatment = $(e.relatedTarget).data('treatment');
                var protocol = treatment.protocol_name;// treatment.protocol
                $(this).find('.badge-protocol').text( protocol);
                // treatment.instrucciones
                var instrucciones = treatment.protocol;

                if (treatment.instrucciones) {
                    $.each(treatment.instrucciones, function(i, el) {
                        instrucciones = instrucciones.replace('[[campo]]', '<span class="form-show">'+el+'</span><input name="instructions[]" class="form-control form-edit hide" value="' + el + '">');
                    });
                    instrucciones = instrucciones.split('[[campo]]').join('<input name="instructions[]" class="form-control form-edit hide" value="">');
                    $(this).find('.modal-body').html(instrucciones);
                    $(this).find('.modal-body').append('<input type="hidden" name="treatment_id" value="'+treatment.treatment_id+'">');
                    $(this).find('.modal-body').append('<input type="hidden" name="updated_by" value="'+treatment.updatedby+'">');
                }
                else {
                    e.preventDefault();
                    alert('Error, no se definieron valores para este Esquema!');
                }
            });

            $('#display-protocol').on('hide.bs.modal', function(e){
                var btn_save = $(this).siblings('.btn-save-protocol');
                var form = $(this).parents().find('.form-inline');

                $('.btn-save-protocol').addClass('hide');
                $('.form-edit').addClass('hide');
                $('.form-show').removeClass('hide');

            })

            $('.btn-edit-protocol').on('click', function(e){
                // e.preventDefault();
                $(this).addClass('hidden');
                var btn_save = $(this).siblings('.btn-save-protocol');
                var form = $(this).parents().find('.form-inline');

                btn_save.removeClass('hide');
                form.find('.form-show').addClass('hide');
                form.find('.form-edit').removeClass('hide');
                // console.log(  );
            });

            $('.btn-save-protocol').on('click', function(e){

                targetUrl = window.baseURL + '/patients/' + window.patientID + '/instructions';

                e.preventDefault();

                var form = $(this).parents().find('.form-inline');
                var treatment_id = form.find('input[name="treatment_id"]');
                var updated_by = form.find('input[name="updated_by"]');
                var inputs = form.find('input[name="instructions[]"]');

                var instructions = [];

                $.each(inputs, function(i, el ){

                    instructions.push($(el).val());
                });

                var form_data = {
                    '_token': $('meta[name=_token]').attr('content'),
                    'treatment_id': $(treatment_id).val(),
                    'updated_by': $(updated_by).val(),
                    'instructions': instructions
                };


                $.ajax({
                    data: form_data,
                    dataType: 'json',
                    error: function(j, t, e) {
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function( response ){
                        if( response.status == 'success' ){
                            window.location = response.url;
                        } else {
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url:targetUrl
                })
            })


            $('#treatment-log').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $(this).find('input[name=patient_treatment_id]').val(id);
                var action = treatmentLogPostRoute.replace('id', id);
                $(this).find('form').attr('action', action);
            });

            $('#cancel-treatment').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $(this).find('input[name=id]').val(id);
            });

            $('#finish-treatment').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $(this).find('input[name=id]').val(id);
            });
        });
    </script>
@endsection

@section('modals')
    <div class="modal fade" id="printTreatmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(['route' => ['patients.treatment.pdf', $item->id], 'method' => 'POST']) }}
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <h4>Seleccione las opciones a imprimir</h4>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="history"> Con Historico
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="protocol"> Con Esquema
                        </label>
                    </div>

                    <div class="form-group" style="margin:15px 0 0">
                        <button type="submit" class="btn btn-primary">Imprimir</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
                    </div>

                    {{ Form::close() }}

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="printTreatmentOnlyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(['route' => ['patients.treatment-only.pdf', $item->id, ], 'method' => 'POST', 'form-treatment']) }}
                    <input type="hidden" name="pt_patient">
                    <input type="hidden" name="pt_treatment">

                    <h4>Seleccione las opciones a imprimir</h4>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="history"> Con Historico
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="protocol"> Con Esquema
                        </label>
                    </div>

                    <div class="form-group" style="margin:15px 0 0">
                        <button type="submit" class="btn btn-primary">Imprimir</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
                    </div>

                    {{ Form::close() }}

                </div>

            </div>
        </div>
    </div>

    <div class="modal inmodal" id="display-protocol" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInTop">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Esquema</h4>
                    <label class="badge-protocol badge badge-default"></label>
                </div>
                <div class="modal-body form-inline">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white btn-edit-protocol">Editar</button>
                    <button type="button" class="btn btn-primary btn-save-protocol hide">Guardar</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="treatment-log" tabindex="-1" role="dialog" aria-hidden="true">
    {{ Form::open(['route' => ['patient.treatments.store', 'id'], 'method' => 'POST']) }}
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Registrar Aplicaci&oacute;n</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Ciclo</label>
                        {!! Form::text('ciclo', null, ['class' => 'form-control', 'placeholder' => 'Ciclo']) !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Toxicidad</label>
                        {!! Form::text('toxicidad', null, ['class' => 'form-control', 'placeholder' => 'Toxicidad']) !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tensión Arterial</label>
                        {!! Form::text('tension_arterial', null, ['class' => 'form-control', 'placeholder' => 'Tensión Arterial']) !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Frecuencia Cardíaca</label>
                        {!! Form::text('frecuencia_cardiaca', null, ['class' => 'form-control', 'placeholder' => 'Frecuencia Cardíaca']) !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Peso</label>
                        {!! Form::text('peso', null, ['class' => 'form-control', 'placeholder' => 'Peso']) !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Observaciones</label>
                        {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'placeholder' => 'Observaciones']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar Histórico</button>
                </div>
            </div>
        </div>
    {{ Form::close() }}
    </div>

    <div class="modal inmodal" id="cancel-treatment" tabindex="-1" role="dialog" aria-hidden="true">
    {{ Form::open(['route' => ['patients.treatment.update-status', $item->id], 'method' => 'PUT']) }}
        {{ Form::hidden('id', '') }}
        {{ Form::hidden('estado', 'cancelado') }}
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Cancelar Tratamiento</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Observación</label>
                        <textarea name="notes" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Cancelar Tratamiento</button>
                </div>
            </div>
        </div>
    {{ Form::close() }}
    </div>

    <div class="modal inmodal" id="finish-treatment" tabindex="-1" role="dialog" aria-hidden="true">
    {{ Form::open(['route' => ['patients.treatment.update-status', $item->id], 'method' => 'PUT']) }}
        {{ Form::hidden('id', '') }}
        {{ Form::hidden('estado', 'cerrado') }}
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Fin de Tratamiento</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Observación</label>
                        <textarea name="notes" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Fin de Tratamiento</button>
                </div>
            </div>
        </div>
    {{ Form::close() }}
    </div>
@endsection

@section('after-script-app')
    @parent
    <script>
        jQuery(document).ready(function($) {

            if( $('.redactor').size() > 0 ){
                $('.redactor').redactor({
                    minHeight: 200,
                    buttons: ['formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'outdent', 'indent', 'image', 'file', 'link', 'alignment', 'horizontalrule', 'html'],
                    plugins: ['instructions'],
                    lang: 'es_ar',
                    convertLinks: true
                });
            }

        });
    </script>
@endsection
