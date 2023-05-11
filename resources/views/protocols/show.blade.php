@extends('layouts.resource')

@section('page-title', $title)

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['edit'], $item->id) }}"><i class="fa fa-edit fa-fw"></i>Editar Esquema</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <dl class="dl-horizontal">
                        <dt>Nombre</dt>
                        <dd>{{ $item->name }}</dd>
                        <dt>Instrucciones</dt>
                        <dd>{!! str_replace('@{{campo}}', '<input class="form-control1" name="instructions[]" value="" />', $item->instructions) !!}</dd>
                        <dt>Activo?</dt>
                        <dd>{{ ($item->is_active == TRUE) ? 'Sí' : 'No' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
