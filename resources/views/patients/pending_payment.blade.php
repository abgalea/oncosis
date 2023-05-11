@extends('layouts.resource_patient')

@section('page-title', $title)

@section('action-buttons')
<div class="title-action">
    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#seguimiento">
        <i class="fa fa-history fa-fw"></i>Agregar Seguimiento
    </a>
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
                            @if (count($items) > 0)
                            @foreach($items as $rowItem)
                            @if ($rowItem['type'] == 'consultation')
                            {!! Form::open( ['method' => 'PUT', 'route' => ['patients.payment.update', $rowItem['id'] ], 'class' => 'form-horizontal']) !!}
                            <div id="consultation-{{ $rowItem['id'] }}" class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h3 class="panel-title">Consulta &mdash; {{ date('d/m/Y', strtotime($rowItem['consulta_fecha'])) }}</h3>
                                        <small>Última modificación: {{ date(('d/m/Y'), strtotime($rowItem['updated_at'])) }} |
                                        por {{ $rowItem['updatedby']['first_name'] }} {{ $rowItem['updatedby']['last_name'] }}</small>
                                        <input type="hidden" name="type" value="consultation">
                                        <input type="hidden" name="treatment_payed" value="">
                                    </div>
                                    <div class="pull-right">
                                        <span class="label label-inverse label-price">${{ number_format($rowItem['treatment_fee'], 0, '', '.') }}</span>
                                        @if ($rowItem['treatment_payed'])
                                        <span class="label label-success">PAGADO</span>
                                        @else
                                        <span class="label label-warning">PENDIENTE DE PAGO</span>
                                        @endif
                                        @if( !empty($rowItem['treatment_billable']) )
                                        <span class="label label-{{ ($rowItem['treatment_billable']) ? 'info' : 'danger'}}">{{ ($rowItem['treatment_billable']) ? 'COBRABLE' : 'NO COBRABLE'}}</span>
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <div class="row  form-edit hide">
                                        <div class="col-sm-3">
                                            <div class="" style="margin-bottom:15px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Precio</span> {!! Form::text('treatment_fee', $rowItem['treatment_fee'],
                                                    ['class' => 'form-control', 'placeholder' => '$']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Tipo:</strong>
                                            <br />
                                            @if ($rowItem['consulta_tipo'] == 'RECAIDA')
                                            <span class="label recaida">RECAIDA</span>
                                            @else
                                            {{ $rowItem['consulta_tipo'] }}
                                            @endif
                                            <br />
                                            <br />
                                            <strong>Institución:</strong>
                                            <br />
                                            {{ $rowItem['provider']['name'] }}
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Resumen:</strong>
                                                    <br />
                                                    {!! nl2br($rowItem['consulta_resumen']) !!}
                                                    <br />
                                                    <br />
                                                </div>
                                                <div class="col-md-3">
                                                    <strong>Peso:</strong> {{ $rowItem['consulta_peso'] }}
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <strong>Altura:</strong> {{ $rowItem['consulta_altura'] }}
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <strong>Sup. Corp.:</strong> {{ $rowItem['consulta_superficie_corporal'] }}
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <strong>Presión Art.:</strong> {{ $rowItem['consulta_presion_arterial'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-toolbar" style="margin-top:20px">

                                                <a class="btn btn-default" data-id="{{ $rowItem['id'] }}" data-type="consultation" data-patient="{{ $item->id }}" data-toggle="modal" data-target="#payment-log"><i class="fa fa-check-circle-o fa-fw"></i>Registrar Histórico</a>

                                                @if (!$rowItem['treatment_payed'])
                                                <button class="btn btn-success btn-pay" data-id="{{ $rowItem['id'] }}" data-type="consultation" type="submit"><i class="fa fa-money fa-fw"></i> Pagar</button>
                                                @endif
                                                @role(array('admin'))
                                                @if ($rowItem['treatment_payed'])
                                                <button class="btn btn-info btn-restore" data-id="{{ $rowItem['id'] }}" data-type="consultation" type="button"><i class="fa fa-money fa-fw"></i> Declinar Pago</button>
                                                @endif
                                                @endrole
                                                <a class="btn btn-warning btn-edit" data-id="{{ $rowItem['id'] }}" data-type="consultation"><i class="fa fa-pencil-square-o fa-fw"></i> Editar</a>

                                                <button class="btn btn-default btn-cancel hide" type="button" data-id="{{ $rowItem['id'] }}" data-type="consultation"><i class="fa fa-times-circle-o fa-fw"></i>Cancelar</button>
                                                <button class="btn btn-warning btn-save hide" type="submit" data-id="{{ $rowItem['id'] }}" data-type="consultation"><i class="fa fa-floppy-o fa-fw"></i>Guardar</button>

                                                <a class="btn btn-default" type="button" href="{{ route( 'patients.payment-item.pdf', [$item->id, $rowItem['id'], 'consultation']) }}"><i class="fa fa-print fa-fw"></i> Imprimir</a>
                                            </div>
                                        </div>
                                    </div>

                                    @if( !$rowItem['logs']->isEmpty() )
                                    <hr>
                                    <h3 class="panel-title">Histórico</h3>
                                    @foreach($rowItem['logs'] as $log)
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
                                                <div class="col-md-12">
                                                    <strong>Comentarios</strong>
                                                    <br>
                                                    {{ $log->log }}
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
                            @endif

                            @if ($rowItem['type'] == 'treatment')
                            {!! Form::open( ['method' => 'PUT', 'route' => ['patients.payment.update', $rowItem['treatment_id'] ], 'class' => 'form-horizontal']) !!}
                            <div id="treatment-{{ $rowItem['id'] }}" class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h3 class="panel-title">{{ 'T. ' . $rowItem['treatment_id'] . ' - ' .$rowItem['tratamiento_nombre'] }}</h3>
                                        <small>Última modificación: {{ date(('d/m/Y'), strtotime($rowItem['updated_at'])) }} |
                                        por {{ $rowItem['updatedby']['first_name'] }} {{ $rowItem['updatedby']['last_name'] }} </small>
                                        <input type="hidden" name="type" value="treatment">
                                        <input type="hidden" name="log" value="{{ $rowItem['log_id'] }}">
                                        <input type="hidden" name="treatment_payed" value="">
                                    </div>
                                    <div class="pull-right">

                                        <span class="label label-inverse label-price">${{ number_format($rowItem['treatment_fee'], 0, '', '.') }}</span>
                                        @if ($rowItem['treatment_payed'])
                                        <span class="label label-success">PAGADO</span>
                                        @else
                                        <span class="label label-warning">PENDIENTE DE PAGO</span>
                                        @endif
                                        @if( !is_null($rowItem['treatment_billable']) )
                                        <span class="label label-{{ ($rowItem['treatment_billable']) ? 'info' : 'danger'}}">{{ ($rowItem['treatment_billable']) ? 'COBRABLE' : 'NO COBRABLE'}}</span>
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <div class="row  form-edit hide">
                                        <div class="col-sm-3">
                                            <div class="" style="margin-bottom:15px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Precio</span>
                                                    {!! Form::text('treatment_fee', $rowItem['treatment_fee'], ['class' => 'form-control', 'placeholder' => '$']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-show">
                                                <strong>Fecha Facturacion:</strong> {{ $rowItem['treatment_payed_at'] }}
                                            </div>
                                            <div class="form-edit hide">
                                                <label>Fecha Facturacion</label>
                                                <div class="input-group date" style="margin-bottom:15px;">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    {!! Form::text('treatment_payed_at', $rowItem['treatment_payed_at'], ['class' => 'form-control date-picker', 'placeholder' => 'Fecha Facturacion']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <strong>Fecha Registro Tratamiento:</strong> {{ $rowItem['fecha_inicio'] }}
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <strong>Fecha Fin:</strong> {{ ($rowItem['fecha_fin']) ? $rowItem['fecha_fin'] : 'N/D' }}
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Localización/Patología:</strong> {{ $rowItem['pathology_location']['pathology']['name'] }} {{ $rowItem['pathology_location']['tipo'] }}
                                        </div>{{--
                                        <div class="col-md-2 form-group">
                                            <strong>Ciclos:</strong> {{ $rowItem['ciclos'] }}
                                        </div> --}}
                                        <br />
                                    </div>
                                    @if ($rowItem['tratamiento'] == 'RADIOTERAPIA')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Dosis diaria:</strong> {{ $rowItem['dosis_diaria'] }}
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <strong>Dosis total:</strong> {{ $rowItem['dosis_total'] }}
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <strong>Boost:</strong> {{ $rowItem['boost'] }}
                                        </div>
                                        <div class="col-md-2">
                                            <strong>Braquiterapia?:</strong> {{ ($rowItem['braquiterapia']) ? 'Si' : 'No' }}
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <strong>Dosis:</strong> {{ $rowItem['dosis'] }}
                                        </div>
                                    </div>
                                    @endif
                                    @if ($rowItem['tratamiento'] == 'DROGAS TARGET')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Dosis diaria:</strong> {{ $rowItem['dosis_diaria'] }}
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <strong>Frecuencia:</strong> {{ $rowItem['frecuencia'] }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Detalle</strong>
                                            <br>
                                            {!! nl2br($rowItem['observaciones']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-toolbar" style="margin-top:20px">

                                                <a class="btn btn-default" data-id="{{ $rowItem['log_id'] }}" data-type="treatment" data-patient="{{ $item->id }}" data-toggle="modal" data-target="#payment-log"><i class="fa fa-check-circle-o fa-fw"></i>Registrar Detalle</a>

                                                @if (!$rowItem['treatment_payed'])
                                                <button class="btn btn-success btn-pay" data-id="{{ $rowItem['id'] }}" data-type="treatment" type="submit"><i class="fa fa-money fa-fw"></i> Pagar</button>
                                                @endif
                                                @role(array('admin'))
                                                @if ($rowItem['treatment_payed'])
                                                <button class="btn btn-info btn-restore" data-id="{{ $rowItem['id'] }}" data-type="treatment" type="button"><i class="fa fa-money fa-fw"></i> Declinar Pago</button>
                                                @endif
                                                @endrole
                                                <a class="btn btn-warning btn-edit" data-id="{{ $rowItem['id'] }}" data-type="treatment"><i class="fa fa-pencil-square-o fa-fw"></i> Editar</a>

                                                <button class="btn btn-default btn-cancel hide" type="button" data-id="{{ $rowItem['id'] }}" data-type="treatment"><i class="fa fa-times-circle-o fa-fw"></i>Cancelar</button>
                                                <button class="btn btn-warning btn-save hide" type="submit" data-id="{{ $rowItem['id'] }}" data-type="treatment"><i class="fa fa-floppy-o fa-fw"></i>Guardar</button>

                                                <a class="btn btn-default" type="button" href="{{ route( 'patients.payment-item.pdf', [$item->id, $rowItem['treatment_id'], 'treatment', $rowItem['log_id']]) }}"><i class="fa fa-print fa-fw"></i> Imprimir</a>

                                            </div>
                                        </div>
                                    </div>

                                    @if( !$rowItem['plogs']->isEmpty() )
                                    <hr>
                                    <h3 class="panel-title">Detalle</h3>
                                    @foreach($rowItem['plogs'] as $log)
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
                                                <div class="col-md-12">
                                                    <strong>Comentarios</strong>
                                                    <br>
                                                    {{ $log->log }}
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
                            @endif
                            @endforeach
                            @else
                            <p>No existen consultas y/o tratamientos pendientes de pago para este paciente.</p>
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

    var treatmentLogPostRoute = '{{ route('patient.payments.store', ['id']) }}';

    $(document).ready(function() {
        $('a.btn-edit').on('click', function(e) {
            e.preventDefault();
            var containerId = '#' + $(this).data('type') + '-' + $(this).data('id');
            var container = $(containerId);

            if (container.length > 0) {
                $(containerId + ' .form-show').addClass('hide');
                $(containerId + ' .form-edit').removeClass('hide');
                $(containerId + ' button.btn-save').removeClass('hide');
                $(containerId + ' button.btn-cancel').removeClass('hide');
                $(containerId + ' a.btn-pay').addClass('hide');
                $(containerId + ' a.btn-edit').addClass('hide');
            }
        });

        $('button.btn-cancel').on('click', function(e) {
            e.preventDefault();
            var containerId = '#' + $(this).data('type') + '-' + $(this).data('id');
            var container = $(containerId);
            if (container.length > 0) {
                $(containerId + ' .form-show').removeClass('hide');
                $(containerId + ' .form-edit').addClass('hide');
                $(containerId + ' button.btn-save').addClass('hide');
                $(containerId + ' button.btn-cancel').addClass('hide');
                $(containerId + ' button.btn-edit').removeClass('hide');
                $(containerId + ' a.btn-pay').removeClass('hide');
                $(containerId + ' a.btn-edit').removeClass('hide');
            }
        });

        $('.btn-pay').on('click', function(e){
            e.preventDefault();
            var type = $(this).data('type') == 'treatment' ? 'el ciclo seleccionado del tratamiento' : 'la consulta';
            var containerId = '#' + $(this).data('type') + '-' + $(this).data('id');

            swal(
            {
                title: 'Pagar ' + type,
                text: 'Se marcará como pagado ' + type + ', estás seguro/a que desea continuar?',
                type: 'warning',
                showCancelButton: true, cancelButtonText: 'No, cancelar', confirmButtonColor: '#DD6B55', confirmButtonText: 'Sí, estoy seguro/a!',
                closeOnConfirm: false
            },
            function () {
                var container = $(containerId);

                if (container.length > 0) {
                    $(containerId).find('input[name="treatment_payed"]').val(1);
                    $(containerId).parent('form').submit();
                }
            }
            );
            //
            // var containerId = '#' + $(this).data('type') + '-' + $(this).data('id');
            // var container = $(containerId);
            // if (container.length > 0) {
            //     $(containerId).find('input[name="treatment_payed"]').val(1);
            //     $(containerId).parent('form').submit();
            // }
        });

        $('.btn-restore').on('click', function(e){
            e.preventDefault();
            var type = $(this).data('type') == 'treatment' ? 'el ciclo seleccionado del tratamiento' : 'la consulta';
            var containerId = '#' + $(this).data('type') + '-' + $(this).data('id');

            swal(
            {
                title: 'Cancelar Pago',
                text: 'Se marcará como NO Pagado ' + type + ', estás seguro/a que desea continuar?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No, cancelar',
                confirmButtonColor: '#23c6c8',
                confirmButtonText: 'Sí, estoy seguro/a!',
                closeOnConfirm: false
            },
            function () {
                var container = $(containerId);

                if (container.length > 0) {
                    $(containerId).find('input[name="treatment_payed"]').val(0);
                    $(containerId).parent('form').submit();
                }
            }
            );
        });

        $('#payment-log').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            var type = $(e.relatedTarget).data('type');
            var patient = $(e.relatedTarget).data('patient');

            $(this).find('input[name=item_id]').val(id);
            $(this).find('input[name=type]').val(type);
            var action = treatmentLogPostRoute.replace('id', patient);
            $(this).find('form').attr('action', action);
        });

    });
</script>
@endsection

@section('modals')

<div class="modal inmodal" id="payment-log" tabindex="-1" role="dialog" aria-hidden="true">
    {{ Form::open(['route' => ['patient.treatments.store', 'id'], 'method' => 'POST']) }}
    {{ Form::hidden('item_id', '') }}
    {{ Form::hidden('type', '') }}

    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Registrar Detalle</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label">Comentarios</label>
                    {!! Form::textarea('log', null, ['class' => 'form-control', 'placeholder' => 'Comentarios']) !!}
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
@endsection
