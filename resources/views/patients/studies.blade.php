@extends('layouts.resource_patient')

@section('page-title', $title)

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#seguimiento"><i class="fa fa-history fa-fw"></i>Agregar Seguimiento</a>
    </div>
@endsection

@section('resource-content')
    <script type="text/javascript">
        window.tests = {!! $tests !!};
    </script>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="ibox">
                    <div class="ibox-content">
                        @include('patients/_data')
                        <div class="row m-t-sm">
                            <div class="col-xs-12 col-lg-12">
                                @if (count($tests) > 0)
                                    @foreach($tests as $test)
                                {!! Form::model($test, ['method' => 'PUT', 'route' => ['patients.studies.update', $test->id], 'class' => 'form-horizontal']) !!}
                                <div id="study-{{ $test->id }}" class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h3 class="panel-title">{{ $test->estudio_fecha->format('d/m/Y') }}</h3>
                                        </div>
                                        <div class="pull-right">
                                            Última modificación: {{ $test->updated_at->format('d/m/Y') }} |
                                            por {{ $test->updatedby->first_name }} {{ $test->updatedby->last_name }}
                                            @if ($test->recaida)
                                            | <span class="label recaida">RECAIDA</span>
                                            @endif

                                            @if ($test->rc)
                                            <span class="label label-warning">RC</span>
                                            @endif

                                            @if ($test->rp)
                                            <span class="label label-warning">RP</span>
                                            @endif

                                            @if ($test->ee)
                                            <span class="label label-warning">EE</span>
                                            @endif

                                            @if ($test->progresion)
                                            <span class="label label-info">Progresi&oacute;n</span>
                                            @endif

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            @if( isset( $test->pathology_id ))
                                            <div class="col-md-12">
                                                <div class="form-show">
                                                    <strong>Patología</strong>
                                                    <br>
                                                    {!! $test->pathology->name !!}
                                                    <br />
                                                    <br />
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Patología</label>
                                                    {!! Form::select('pathology_id', $pathologies, null, ['class' => 'form-control', 'placeholder' => 'Patología']) !!}
                                                </div>
                                            </div>
                                            @endif

                                            <div class="col-md-12">
                                                <div class="form-show">
                                                    <strong>Detalle:</strong>
                                                    <br />
                                                    {!! nl2br($test->estudio_detalle) !!}
                                                    <br />
                                                    <br />
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Detalle</label>
                                                    {!! Form::textarea('estudio_detalle', null, ['class' => 'form-control redactor', 'placeholder' => 'Detalle']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-show">
                                                    <strong>Laboratorio:</strong>
                                                    <br />
                                                    {!! nl2br($test->estudio_laboratorio) !!}
                                                    <br />
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Laboratorio</label>
                                                    {!! Form::textarea('estudio_laboratorio', null, ['class' => 'form-control redactor', 'placeholder' => 'Laboratorio']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        @if( $test->hasMedia('studies') )
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <h5 style="margin-top:0;">Anatomía Patológica</h5>
                                                @foreach($test->getMedia('studies') as $study )
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
                                                <button class="btn btn-default" @click.prevent="borrarEstudio({{ $test->id }})"><i class="fa fa-times fa-fw"></i>Borrar</button>
                                                <button class="btn btn-default btn-edit" data-id="{{ $test->id }}"><i class="fa fa-pencil-square-o fa-fw"></i>Editar</button>
                                                <button class="btn btn-default btn-save hide" type="submit" data-id="{{ $test->id }}"><i class="fa fa-floppy-o fa-fw"></i>Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                    @endforeach
                                @else
                                <p>No existen estudios registrados para este paciente.</p>
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
                var containerId = '#study-' + $(this).data('id');
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
