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
                                @foreach($items as $row)
                                    @if ($row['type'] == 'consultation')
                                    <div id="consultation-{{ $row['id'] }}" class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">{{ date('d/m/Y', strtotime($row['consulta_fecha'])) }}</h3>
                                            </div>
                                            <div class="pull-right">
                                                Última modificación: {{ date(('d/m/Y'), strtotime($row['updated_at'])) }} |
                                                por {{ $row['updatedby']['first_name'] }} {{ $row['updatedby']['last_name'] }} |
                                                Estado:
                                                @if ($row['consulta_pagada'])
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
                                                    <strong>Tipo:</strong>
                                                    <br />
                                                    @if ($row['consulta_tipo'] == 'RECAIDA')
                                                    <span class="label recaida">RECAIDA</span>
                                                    @else
                                                    {{ $row['consulta_tipo'] }}
                                                    @endif
                                                    <br />
                                                    <br />
                                                    <strong>Institución:</strong>
                                                    <br />
                                                    {{ $row['provider']['name'] }}
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <strong>Resumen:</strong>
                                                            <br />
                                                            {!! nl2br(e($row['consulta_resumen'])) !!}
                                                            <br />
                                                            <br />
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <strong>Peso:</strong> {{ $row['consulta_peso'] }}
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <strong>Altura:</strong> {{ $row['consulta_altura'] }}
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <strong>Sup. Corp.:</strong> {{ $row['consulta_superficie_corporal'] }}
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <strong>Presión Art.:</strong> {{ $row['consulta_presion_arterial'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($row['type'] == 'location')
                                    <div id="location-{{ $row['id'] }}" class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">{{ $row['pathology']['name'] }}</h3>
                                            </div>
                                            <div class="pull-right">
                                                Última modificación: {{ date('d/m/Y', strtotime($row['updated_at'])) }} |
                                                por {{ $row['updatedby']['first_name'] }} {{ $row['updatedby']['last_name'] }} |
                                                <span class="label tumor-{{ strtolower($row['tipo']) }}">{{ $row['tipo'] }}</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Fecha Diagnóstico</strong>
                                                    <br>
                                                    {{ ($row['fecha_diagnostico']) ? date('d/m/y', strtotime($row['fecha_diagnostico'])) : '' }}
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <strong>Es Tumor?</strong>
                                                    <br>
                                                    {{ (isset($row['es_tumor'])) ? 'Sí' : 'No' }}
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <strong>Tipo</strong>
                                                    <br>
                                                    {{ $row['tipo'] }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Localización Primaria</strong>
                                                    <br>
                                                    {!! (isset($row['localizacion_primaria'])) ? nl2br(e($row['localizacion_primaria'])) : 'S/D' !!}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>Estadio</strong>
                                                    <br>
                                                    {{ ($row['estadio']) ? $row['estadio'] : 'S/D' }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>T</strong>
                                                    <br>
                                                    {{ ($row['campo_t']) ? $row['campo_t'] : 'S/D' }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>N</strong>
                                                    <br>
                                                    {{ ($row['campo_n']) ? $row['campo_n'] : 'S/D' }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>M</strong>
                                                    <br>
                                                    {{ ($row['campo_m']) ? $row['campo_m'] : 'S/D' }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Histología</strong>
                                                    <br>
                                                    {!! ($row['histologia']) ? nl2br(e($row['histologia'])) : 'S/D' !!}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>Biopsia Quirurgica</strong>
                                                    <br>
                                                    {{ ($row['biopsia']) ? 'Si' : 'No' }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>PAG</strong>
                                                    <br>
                                                    {{ ($row['pag']) ? 'Si' : 'No' }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>PAF</strong>
                                                    <br>
                                                    {{ ($row['paf']) ? 'Si' : 'No' }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>InmunoHistoQuímica</strong>
                                                    <br>
                                                    {!! ($row['inmunohistoquimica']) ? nl2br(e($row['inmunohistoquimica'])) : 'S/D' !!}
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <strong>Receptores Hormonales</strong>
                                                    <br>
                                                    {!! ($row['receptores_hormonales']) ? nl2br(e($row['receptores_hormonales'])) : 'S/D' !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Estrógeno</strong>
                                                    <br>
                                                    {{ ($row['estrogeno']) ? $row['estrogeno'] : 'S/D' }}
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <strong>Progesterona</strong>
                                                    <br>
                                                    {{ ($row['progesterona']) ? $row['progesterona'] : 'S/D' }}
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <strong>Índice Proliferación</strong>
                                                    <br>
                                                    {{ ($row['indice_proliferacion']) ? $row['indice_proliferacion'] : 'S/D' }}
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <strong>Biología Molecular</strong>
                                                    <br>
                                                    {!! ($row['biologia_molecular']) ? nl2br(e($row['biologia_molecular'])) : 'S/D' !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Detalles</strong>
                                                    <br>
                                                    {!! ($row['detalles']) ? nl2br(e($row['detalles'])) : 'S/D' !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($row['type'] == 'physical')
                                    <div id="physical-{{ $row['id'] }}" class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">Físico {{ ($row['fisico_completo'] == true) ? 'Completo' : '' }}</h3>
                                            </div>
                                            <div class="pull-right">
                                                Última modificación: {{ date('d/m/Y', strtotime($row['updated_at'])) }} |
                                                por {{ $row['updatedby']['first_name'] }} {{ $row['updatedby']['last_name'] }}
                                                @if ($row['recaida'])
                                                | <span class="label recaida">RECAIDA</span>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <strong>Peso:</strong> {{ $row['fisico_peso'] }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>Sup. Corp.:</strong> {{ number_format($row['fisico_superficie_corporal'], 2) }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>TA:</strong> {{ $row['fisico_ta'] }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>Talla:</strong> {{ $row['fisico_talla'] }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>Temp:</strong> {{ $row['fisico_temperatura'] }}
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <strong>Presión Art.:</strong> {{ $row['fisico_presion_arterial'] }}
                                                </div>
                                            </div>
                                            @if ($row['fisico_completo'])
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Cabeza:</strong> {{ $row['fisico_cabeza'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Cuello:</strong> {{ $row['fisico_cuello'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Torax:</strong> {{ $row['fisico_torax'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Abdómen:</strong> {{ $row['fisico_abdomen'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Urogenital:</strong> {{ $row['fisico_urogenital'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Tacto Rectal:</strong> {{ $row['fisico_tacto_rectal'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Tacto Vaginal:</strong> {{ $row['fisico_tacto_vaginal'] }}
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <strong>Mama:</strong> {{ $row['fisico_mama'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Neurológico:</strong> {{ $row['fisico_neurologico'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Locomotor:</strong> {{ $row['fisico_locomotor'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Linfogangliar:</strong> {{ $row['fisico_linfogangliar'] }}
                                                    <br />
                                                    <br />
                                                    <strong>T.C.S.:</strong> {{ $row['fisico_tcs'] }}
                                                    <br />
                                                    <br />
                                                    <strong>Piel:</strong> {{ $row['fisico_piel'] }}
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    @if ($row['type'] == 'study')
                                    <div id="study-{{ $row['id'] }}" class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">{{ date('d/m/Y', strtotime($row['estudio_fecha'])) }}</h3>
                                            </div>
                                            <div class="pull-right">
                                                Última modificación: {{ date('d/m/Y', strtotime($row['updated_at'])) }} |
                                                por {{ $row['updatedby']['first_name'] }} {{ $row['updatedby']['last_name'] }}
                                                @if ($row['recaida'])
                                                | <span class="label recaida">RECAIDA</span>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Detalle:</strong>
                                                    <br />
                                                    {!! nl2br(e($row['estudio_detalle'])) !!}
                                                    <br />
                                                    <br />
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <strong>Laboratorio:</strong>
                                                    <br />
                                                    {!! nl2br(e($row['estudio_laboratorio'])) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($row['type'] == 'treatment')
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
