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
                                @if (count($item->physicals) > 0)
                                    @foreach($item->physicals as $patientPhysical)
                                {!! Form::model($patientPhysical, ['method' => 'PUT', 'route' => ['patients.physical.update', $patientPhysical->id], 'class' => 'form-horizontal']) !!}
                                <div id="physical-{{ $patientPhysical->id }}" class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h3 class="panel-title">Físico {{ ($patientPhysical->fisico_completo == true) ? 'Completo' : '' }} - {{ $patientPhysical->fecha_registro->format('d/m/Y') }}</h3>
                                        </div>
                                        <div class="pull-right">
                                            Última modificación: {{ $patientPhysical->updated_at->format('d/m/Y') }} |
                                            por {{ $patientPhysical->updatedby->first_name }} {{ $patientPhysical->updatedby->last_name }}
                                            @if ($patientPhysical->recaida)
                                            | <span class="label recaida">RECAIDA</span>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-show">
                                                    <strong>Peso:</strong> {{ $patientPhysical->fisico_peso }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Peso</label>
                                                    {!! Form::text('fisico_peso', null, ['class' => 'form-control', 'placeholder' => 'Peso']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>Sup. Corp.:</strong> {{ number_format((float)$patientPhysical->fisico_superficie_corporal, 2) }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Sup. Corp.</label>
                                                    {!! Form::text('fisico_superficie_corporal', null, ['class' => 'form-control', 'placeholder' => 'Sup. Corp.']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>FC:</strong> {{ $patientPhysical->fisico_ta }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">TA</label>
                                                    {!! Form::text('fisico_ta', null, ['class' => 'form-control', 'placeholder' => 'TA']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>Talla:</strong> {{ $patientPhysical->fisico_talla }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Talla</label>
                                                    {!! Form::text('fisico_talla', null, ['class' => 'form-control', 'placeholder' => 'Talla']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>Temp:</strong> {{ $patientPhysical->fisico_temperatura }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Temp</label>
                                                    {!! Form::text('fisico_temperatura', null, ['class' => 'form-control', 'placeholder' => 'Temp']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-show">
                                                    <strong>Presión Art.:</strong> {{ $patientPhysical->fisico_presion_arterial }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Presión Art.</label>
                                                    {!! Form::text('fisico_presion_arterial', null, ['class' => 'form-control', 'placeholder' => 'Presión Art.']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        @if ($patientPhysical->fisico_completo)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-show">
                                                    <strong>Cabeza:</strong> {{ $patientPhysical->fisico_cabeza }}
                                                    <br />
                                                    <br />
                                                    <strong>Cuello:</strong> {{ $patientPhysical->fisico_cuello }}
                                                    <br />
                                                    <br />
                                                    <strong>Torax:</strong> {{ $patientPhysical->fisico_torax }}
                                                    <br />
                                                    <br />
                                                    <strong>Abdómen:</strong> {{ $patientPhysical->fisico_abdomen }}
                                                    <br />
                                                    <br />
                                                    <strong>Urogenital:</strong> {{ $patientPhysical->fisico_urogenital }}
                                                    <br />
                                                    <br />
                                                    <strong>Tacto Rectal:</strong> {{ $patientPhysical->fisico_taco_rectal }}
                                                    <br />
                                                    <br />
                                                    <strong>Tacto Vaginal:</strong> {{ $patientPhysical->fisico_tacto_vaginal }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Cabeza</label>
                                                    {!! Form::text('fisico_cabeza', null, ['class' => 'form-control', 'placeholder' => 'Cabeza']) !!}
                                                    <label class="control-label">Cuello</label>
                                                    {!! Form::text('fisico_cuello', null, ['class' => 'form-control', 'placeholder' => 'Cuello']) !!}
                                                    <label class="control-label">Torax</label>
                                                    {!! Form::text('fisico_torax', null, ['class' => 'form-control', 'placeholder' => 'Torax']) !!}
                                                    <label class="control-label">Abdómen</label>
                                                    {!! Form::text('fisico_abdomen', null, ['class' => 'form-control', 'placeholder' => 'Abdómen']) !!}
                                                    <label class="control-label">Urogenital</label>
                                                    {!! Form::text('fisico_urogenital', null, ['class' => 'form-control', 'placeholder' => 'Urogenital']) !!}
                                                    <label class="control-label">Tacto Rectal</label>
                                                    {!! Form::text('fisico_tacto_rectal', null, ['class' => 'form-control', 'placeholder' => 'Tacto Rectal']) !!}
                                                    <label class="control-label">Tacto Vaginal</label>
                                                    {!! Form::text('fisico_tacto_vaginal', null, ['class' => 'form-control', 'placeholder' => 'Tacto Vaginal']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <div class="form-show">
                                                    <strong>Mama:</strong> {{ $patientPhysical->fisico_mama }}
                                                    <br />
                                                    <br />
                                                    <strong>Neurológico:</strong> {{ $patientPhysical->fisico_neurologico }}
                                                    <br />
                                                    <br />
                                                    <strong>Locomotor:</strong> {{ $patientPhysical->fisico_locomotor }}
                                                    <br />
                                                    <br />
                                                    <strong>Linfogangliar:</strong> {{ $patientPhysical->fisico_linfogangliar }}
                                                    <br />
                                                    <br />
                                                    <strong>T.C.S.:</strong> {{ $patientPhysical->fisico_tcs }}
                                                    <br />
                                                    <br />
                                                    <strong>Piel:</strong> {{ $patientPhysical->fisico_piel }}
                                                </div>
                                                <div class="form-edit hide">
                                                    <label class="control-label">Mama</label>
                                                    {!! Form::text('fisico_mama', null, ['class' => 'form-control', 'placeholder' => 'Mama']) !!}
                                                    <label class="control-label">Neurológico</label>
                                                    {!! Form::text('fisico_neurologico', null, ['class' => 'form-control', 'placeholder' => 'Neurológico']) !!}
                                                    <label class="control-label">Locomotor</label>
                                                    {!! Form::text('fisico_locomotor', null, ['class' => 'form-control', 'placeholder' => 'Locomotor']) !!}
                                                    <label class="control-label">Linfogangliar</label>
                                                    {!! Form::text('fisico_linfogangliar', null, ['class' => 'form-control', 'placeholder' => 'Linfogangliar']) !!}
                                                    <label class="control-label">T.C.S.</label>
                                                    {!! Form::text('fisico_tcs', null, ['class' => 'form-control', 'placeholder' => 'T.C.S.']) !!}
                                                    <label class="control-label">Piel</label>
                                                    {!! Form::text('fisico_piel', null, ['class' => 'form-control', 'placeholder' => 'Piel']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <button class="btn btn-default" @click.prevent="borrarFisico({{ $patientPhysical->id }})"><i class="fa fa-times fa-fw"></i>Borrar</button>
                                                <button class="btn btn-default btn-edit" data-id="{{ $patientPhysical->id }}"><i class="fa fa-pencil-square-o fa-fw"></i>Editar</button>
                                                <button class="btn btn-default btn-save hide" type="submit" data-id="{{ $patientPhysical->id }}"><i class="fa fa-floppy-o fa-fw"></i>Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                    @endforeach
                                @else
                                <p>No existen registros físicos registrados para este paciente.</p>
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
                var containerId = '#physical-' + $(this).data('id');
                var container = $(containerId);
                if (container.length > 0) {
                    $(containerId + ' .form-show').addClass('hide');
                    $(containerId + ' .form-edit').removeClass('hide');
                    $(containerId + ' button.btn-save').removeClass('hide');
                    $(containerId + ' button.btn-edit').addClass('hide');
                }
            });
        });
    </script>
@endsection
