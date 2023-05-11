@extends('layouts.resource_patient')

@section('page-title', $title)

@section('after-css-app')
<style type="text/css">
    .form-group .form-show label.control-label  {
        font-weight: normal;
    }
</style>
@endsection

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#seguimiento"><i class="fa fa-history fa-fw"></i>Agregar Seguimiento</a>
    </div>
@endsection

@section('resource-tabs')
    <ul class="nav nav-pills">
        <li role="presentation"><a href="{{ route('patients.show', ['id' => $item->id]) }}">Historia Clínica</a></li>
        <li role="presentation"><a href="{{ route('patients.background.show', ['id' => $item->id]) }}">Antecedentes</a></li>
        <li role="presentation"><a href="{{ route('patients.consultation.show', ['id' => $item->id]) }}">Consultas</a></li>
        <li role="presentation" class="active"><a href="{{ route('patients.pathology.show', ['id' => $item->id]) }}">Patología</a></li>
        <li role="presentation"><a href="{{ route('patients.location.show', ['id' => $item->id]) }}">Localización</a></li>
        <li role="presentation"><a href="{{ route('patients.physical.show', ['id' => $item->id]) }}">Físico</a></li>
        <li role="presentation"><a href="{{ route('patients.studies.show', ['id' => $item->id]) }}">Estudios</a></li>
        <li role="presentation"><a href="{{ route('patients.treatment.show', ['id' => $item->id]) }}">Tratamiento</a></li>
        <li role="presentation"><a href="{{ route('patients.relapse.show', ['id' => $item->id]) }}">Recaída</a></li>
    </ul>
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
                                {!! Form::model($item, ['method' => 'POST', 'route' => ['patients.pathology.store', $item->id], 'class' => 'form-horizontal']) !!}
                                    <div>
                                        <button class="btn btn-sm btn-default pull-right m-t-n-xs btn-edit" type="button"><i class="fa fa-pencil fa-fw"></i>Editar Patología</button>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs btn-save hide" type="submit">Guardar</button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Alergia</label>
                                        <div class="col-sm-1">
                                            {!! Form::checkbox('patologia_alergia', 1, null, ['class' => 'js-switch']) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_alergia_tipo }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_alergia_tipo', null, ['class' => 'form-control', 'placeholder' => 'Alergia']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Neurológico</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_neurologico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_neurologico', null, ['class' => 'form-control', 'placeholder' => 'Neurológico']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Osteo Articulares</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_osteo_articular }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_osteo_articular', null, ['class' => 'form-control', 'placeholder' => 'Osteo Articulares']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cardiovascular</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_cardiovascular }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_cardiovascular', null, ['class' => 'form-control', 'placeholder' => 'Cardiovascular']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Locomotor</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_locomotor }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_locomotor', null, ['class' => 'form-control', 'placeholder' => 'Locomotor']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Infectología</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_infectologia }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_infectologia', null, ['class' => 'form-control', 'placeholder' => 'Infectología']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Endocrinológico</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_endocrinologico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_endocrinologico', null, ['class' => 'form-control', 'placeholder' => 'Endocrinológico']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Urológico</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_urologico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_urologico', null, ['class' => 'form-control', 'placeholder' => 'Urológico']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Oncológicos</label>
                                        <div class="col-sm-1">
                                            {!! Form::checkbox('patologia_oncologico', 1, null, ['class' => 'js-switch']) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_oncologico_tipo }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_oncologico_tipo', null, ['class' => 'form-control', 'placeholder' => 'Oncológico']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Neumonologico</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_neumonologico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_neumonologico', null, ['class' => 'form-control', 'placeholder' => 'Neumonologico']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ginecológico</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_ginecologico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_ginecologico', null, ['class' => 'form-control', 'placeholder' => 'Ginecológico']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Metabólico</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_metabolico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_metabolico', null, ['class' => 'form-control', 'placeholder' => 'Metabólico']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Gastrointestinal</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_gastrointestinal }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_gastrointestinal', null, ['class' => 'form-control', 'placeholder' => 'Gastrointestinal']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Colagenopatías</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_colagenopatia }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_colagenopatia', null, ['class' => 'form-control', 'placeholder' => 'Colagenopatías']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Hematológicos</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_hematologico }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_hematologico', null, ['class' => 'form-control', 'placeholder' => 'Hematológicos']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Medicación Concomitante</label>
                                        <div class="col-sm-8">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_concomitante }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::text('patologia_concomitante', null, ['class' => 'form-control', 'placeholder' => 'Medicacion Concomitante']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Otros</label>
                                        <div class="col-sm-4">
                                            <div class="form-show">
                                                <label class="control-label patology-label">{{ $item->patologia_otros }}</label>
                                            </div>
                                            <div class="form-edit hide">
                                                {!! Form::textarea('patologia_otros', null, ['class' => 'form-control', 'placeholder' => 'Otros']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-default pull-right m-t-n-xs btn-edit" type="button"><i class="fa fa-pencil fa-fw"></i>Editar Patología</button>
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
