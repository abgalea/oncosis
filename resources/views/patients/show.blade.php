<?php
use Carbon\Carbon;
?>

@extends('layouts.resource_patient')

@section('page-title', $title)

@section('action-buttons')

        {{-- <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#seguimiento"><i class="fa fa-history fa-fw"></i>Agregar Seguimiento</a> --}}

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
                                <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                                @if (count($history) > 0)
                                    @foreach($history as $history_item)
                                    <div class="vertical-timeline-block">

                                        @if ($history_item->item_tipo == 'metrica')
                                        <div class="vertical-timeline-icon navy-bg">
                                            <i class="fa fa-heartbeat"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'estudio')
                                        <div class="vertical-timeline-icon lazur-bg">
                                            <i class="fa fa-user-md"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'tratamiento')
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-medkit"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'tratamiento_cancelado')
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-medkit"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'tratamiento_cerrado')
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-medkit"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'tratamiento_historico')
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-medkit"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'localizacion')
                                        <div class="vertical-timeline-icon yellow-bg">
                                            <i class="fa fa-dot-circle-o"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'consulta')
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        @endif

                                        @if ($history_item->item_tipo == 'fallecido')
                                        <div class="vertical-timeline-icon black-bg">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @endif

                                        <div class="vertical-timeline-content">

                                            <h2>{!! $history_item->item_titulo !!}</h2>
                                            <p>{!! nl2br($history_item->item_notas) !!}</p>
                                            <span class="vertical-date">

                                                @if ($history_item->item_tipo == 'metrica')
                                                <strong>Físico</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'estudio')
                                                <strong>Estudio</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'tratamiento')
                                                <strong>Tratamiento</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'tratamiento_cancelado')
                                                <strong>Tratamiento Cancelado</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'tratamiento_cerrado')
                                                <strong>Tratamiento Cerrado</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'tratamiento_historico')
                                                <strong>Histórico Tratamiento</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'localizacion')
                                                <strong>Localización</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'consulta')
                                                <strong>Consulta</strong>
                                                @endif

                                                @if ($history_item->item_tipo == 'fallecido')
                                                <strong>Paciente falleció</strong>
                                                @endif
                                                <br />
                                                {{ Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->diffForHumans() }} <br/>
                                                <small>{{ $history_item->updated }} el {{ Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</small>
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <p>No se registran eventos aún para este paciente.</p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')

    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(['route' => ['patients.history.pdf'], 'method' => 'POST']) }}
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <h4>Seleccione las opciones a imprimir</h4>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="background"> Antecedentes
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="consultation"> Consultas
                        </label>
                    </div>
                   {{--  <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="pathology"> Patolog&iacute;as
                        </label>
                    </div> --}}
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="location"> Localizaci&oacute;n
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="physical"> F&iacute;sico
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="studies"> Estudios
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="options[]" value="treatment"> Tratamientos
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
@endsection

@section('after-scripts')
    @parent
@endsection

@section('after-script-app')
    @parent
@endsection
