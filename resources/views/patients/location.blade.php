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
                                @if (count($item->pathologies) > 0)
                                    @foreach($item->pathologies as $patientPathology)
                                {!! Form::model($patientPathology, ['method' => 'PUT', 'route' => ['patients.location.update', $patientPathology->id], 'class' => 'form-horizontal']) !!}
                                <div id="location-{{ $patientPathology->id }}" class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h3 class="panel-title">{{ $patientPathology->pathology->name }}</h3>
                                        </div>
                                        <div class="pull-right">
                                            Última modificación: {{ $patientPathology->updated_at->format('d/m/Y') }} |
                                            por {{ $patientPathology->updatedby->first_name }} {{ $patientPathology->updatedby->last_name }} |
                                            <span class="label tumor-{{ strtolower($patientPathology->tipo) }}">{{ $patientPathology->tipo }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-show">
                                                    <strong>Fecha Diagnóstico</strong>
                                                    <br>
                                                    {{ ($patientPathology->fecha_diagnostico) ? $patientPathology->fecha_diagnostico : '' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Fecha Diagnóstico</label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        {!! Form::text('fecha_diagnostico', $patientPathology->fecha_diagnostico, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <div class="form-show">
                                                    <strong>Es Tumor?</strong>
                                                    <br>
                                                    {{ ($patientPathology->es_tumor) ? 'Sí' : 'No' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Es Tumor?</label>
                                                    {!! Form::text('es_tumor', null, ['class' => 'form-control', 'placeholder' => 'Es Tumor?']) !!}
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6 form-group">
                                                <div class="form-show">
                                                    <strong>Tipo</strong>
                                                    <br>
                                                    {{ $patientPathology->tipo }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Tipo</label>
                                                    <br>
                                                    <label class="radio-inline">
                                                        {!! Form::radio('tipo', 'PRIMARIO', ($patientPathology->tipo == 'PRIMARIO'), []) !!} Seguimiento
                                                    </label>
                                                    <label class="radio-inline">
                                                        {!! Form::radio('tipo', 'SEGUNDO PRIMARIO', ($patientPathology->tipo == 'SEGUNDO PRIMARIO'), []) !!} Segundo Primario
                                                    </label>
                                                    <label class="radio-inline">
                                                        {!! Form::radio('tipo', 'METASTASIS', ($patientPathology->tipo == 'METASTASIS'), []) !!} Primera Vez
                                                    </label>
                                                    <label class="radio-inline">
                                                        {!! Form::radio('tipo', 'RECAIDA', ($patientPathology->tipo == 'RECAIDA'), []) !!} Recaida
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 pull-right">
                                                <div class="form-show">
                                                    <strong>Número</strong>
                                                    <br>
                                                    {{ ($patientPathology->numero == '') ? 'N/D' : $patientPathology->numero }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Número</label>
                                                    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Número']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-4">
                                                <div class="form-show">
                                                    <strong>Localización Primaria</strong>
                                                    <br>
                                                    {!! ($patientPathology->localizacion_primaria) ? nl2br(e($patientPathology->localizacion_primaria)) : 'S/D' !!}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Localización Primaria</label>
                                                    {!! Form::text('localizacion_primaria', null, ['class' => 'form-control', 'placeholder' => 'Localización Primaria']) !!}
                                                </div>
                                            </div> --}}
                                            <div class="col-md-2">
                                                <div class="form-show">
                                                    <strong>Estadio</strong>
                                                    <br>
                                                    {{ ($patientPathology->estadio) ? $patientPathology->estadio : 'S/D' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Estadio</label>
                                                    {!! Form::text('estadio', null, ['class' => 'form-control', 'placeholder' => 'Estadio']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>T</strong>
                                                    <br>
                                                    {{ ($patientPathology->campo_t) ? $patientPathology->campo_t : 'S/D' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">T</label>
                                                    {!! Form::text('campo_t', null, ['class' => 'form-control', 'placeholder' => 'T']) !!}
                                                </div>
                                            </div>


                                            <div class="col-md-2 form-group">
                                                 @if( $patientPathology->campo_n )
                                                <div class="form-show">
                                                    <strong>N</strong>
                                                    <br>
                                                    {{ $patientPathology->campo_n }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">N</label>
                                                    {!! Form::text('campo_n', null, ['class' => 'form-control', 'placeholder' => 'N']) !!}
                                                </div>
                                                @endif
                                            </div>

                                            <div class="col-md-2 form-group">
                                                @if( $patientPathology->campo_m )
                                                <div class="form-show">
                                                    <strong>M</strong>
                                                    <br>
                                                    {{ $patientPathology->campo_m }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">M</label>
                                                    {!! Form::text('campo_m', null, ['class' => 'form-control', 'placeholder' => 'M']) !!}
                                                </div>
                                                @endif
                                            </div>

                                            <div class="col-md-2 col-md-offset-2 pull-right">
                                                @if( $patientPathology->ubicacion )
                                                <div class="form-show">
                                                    <strong>Ubicación</strong>
                                                    <br>
                                                    {{ $patientPathology->ubicacion }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Ubicación</label>
                                                    {!! Form::text('ubicacion', null, ['class' => 'form-control', 'placeholder' => 'Ubicación']) !!}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-bottom: 0.5em;">
                                                <div class="form-show">
                                                    <strong>Histología</strong>
                                                    <br>
                                                    {!! ($patientPathology->histologia) ? nl2br($patientPathology->histologia) : 'S/D' !!}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Histología</label>
                                                    {!! Form::text('histologia', null, ['class' => 'form-control', 'placeholder' => 'Histología']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>Biopsia Quirurgica</strong>
                                                    <br>
                                                    {{ ($patientPathology->biopsia) ? 'Si' : 'No' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Biopsia Quirurgica</label>
                                                    <br>
                                                    {!! Form::checkbox('biopsia', 1, $patientPathology->biopsia, []) !!} Sí
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>PAG</strong>
                                                    <br>
                                                    {{ ($patientPathology->pag) ? 'Si' : 'No' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">PAG</label>
                                                    <br>
                                                    {!! Form::checkbox('pag', 1, $patientPathology->pag, []) !!} Sí
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>PAF</strong>
                                                    <br>
                                                    {{ ($patientPathology->paf) ? 'Si' : 'No' }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">PAF</label>
                                                    <br>
                                                    {!! Form::checkbox('paf', 1, $patientPathology->paf, []) !!} Sí
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" style="margin-bottom: 0.5em;">
                                                <div class="form-show">
                                                    <strong>InmunoHistoQuímica</strong>
                                                    <br>
                                                    {!! ($patientPathology->inmunohistoquimica) ? nl2br($patientPathology->inmunohistoquimica) : 'S/D' !!}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">InmunoHistoQuímica</label>
                                                    {!! Form::text('inmunohistoquimica', null, ['class' => 'form-control', 'placeholder' => 'InmunoHistoQuímica']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                @if( $patientPathology->receptores_hormonales )
                                                <div class="form-show">
                                                    <strong>Receptores Hormonales</strong>
                                                    <br>
                                                    {!! nl2br($patientPathology->receptores_hormonales) !!}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Receptores Hormonales</label>
                                                    {!! Form::text('receptores_hormonales', null, ['class' => 'form-control', 'placeholder' => 'Receptores Hormonales']) !!}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" style="margin-bottom: 0.5em;">
                                                @if( $patientPathology->estrogeno )
                                                <div class="form-show">
                                                    <strong>Estrógeno</strong>
                                                    <br>
                                                    {{ $patientPathology->estrogeno }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Estrógeno</label>
                                                    {!! Form::text('estrogeno', null, ['class' => 'form-control', 'placeholder' => 'Estrógeno']) !!}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 form-group">
                                                @if( $patientPathology->progesterona )
                                                <div class="form-show">
                                                    <strong>Progesterona</strong>
                                                    <br>
                                                    {{ $patientPathology->progesterona }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Progesterona</label>
                                                    {!! Form::text('progesterona', null, ['class' => 'form-control', 'placeholder' => 'Progesterona']) !!}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 form-group">
                                                @if( $patientPathology->indice_proliferacion )
                                                <div class="form-show">
                                                    <strong>Índice Proliferación</strong>
                                                    <br>
                                                    {{ $patientPathology->indice_proliferacion }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Índice Proliferación</label>
                                                    {!! Form::text('indice_proliferacion', null, ['class' => 'form-control', 'placeholder' => 'Índice Proliferación']) !!}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 form-group">
                                                @if($patientPathology->biologia_molecular)
                                                <div class="form-show">
                                                    <strong>Biología Molecular</strong>
                                                    <br>
                                                    {!! nl2br($patientPathology->biologia_molecular) !!}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Biología Molecular</label>
                                                    {!! Form::text('biologia_molecular', null, ['class' => 'form-control', 'placeholder' => 'Biología Molecular']) !!}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if( $patientPathology->detalles )
                                                <div class="form-show">
                                                    <strong>Observaciones</strong>
                                                    <br>
                                                    {!! nl2br($patientPathology->detalles) !!}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Observaciones</label>
                                                    {!! Form::textarea('detalles', null, ['class' => 'form-control', 'placeholder' => 'Detalles']) !!}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if( $patientPathology->hasMedia('studies') )
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <h5 style="margin-top:0;">Anatomía Patológica</h5>
                                                @foreach($patientPathology->getMedia('studies') as $study )
                                                <a href="{{ $study->getUrl() }}" target="_blank">
                                                    <img src="{{ $study->getUrl('thumb') }}" width="100"/>
                                                </a>
                                                @endforeach
                                                <hr>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <button class="btn btn-danger" @click.prevent="borrarLocalizacion({{ $patientPathology->id }})"><i class="fa fa-times fa-fw"></i>Borrar</button>
                                                <button class="btn btn-warning btn-edit" data-id="{{ $patientPathology->id }}"><i class="fa fa-pencil-square-o fa-fw"></i>Editar</button>
                                                <button class="btn btn-default btn-cancel hide" type="button" data-id="{{ $patientPathology->id }}"><i class="fa fa-times-circle-o fa-fw"></i>Cancelar</button>
                                                <button class="btn btn-primary btn-save hide" type="submit" data-id="{{ $patientPathology->id }}"><i class="fa fa-floppy-o fa-fw"></i>Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                    @endforeach
                                @else
                                <p>No existen localizaciones registradas para este paciente.</p>
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
                var containerId = '#location-' + $(this).data('id');
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
                var containerId = '#location-' + $(this).data('id');
                var container = $(containerId);
                if (container.length > 0) {
                    $(containerId + ' .form-show').removeClass('hide');
                    $(containerId + ' .form-edit').addClass('hide');
                    $(containerId + ' button.btn-save').addClass('hide');
                    $(containerId + ' button.btn-cancel').addClass('hide');
                    $(containerId + ' button.btn-edit').removeClass('hide');
                }
            });
        });
    </script>
@endsection
