@extends('layouts.resource')

@section('page-title', $title)

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['edit'], $item->id) }}"><i class="fa fa-edit fa-fw"></i>Editar Práctica</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <dl class="dl-horizontal">
                        <dt>Código Práctica</dt>
                        <dd>{{ $item->short_code }}</dd>
                        <dt>Descripción</dt>
                        <dd>{{ $item->description }}</dd>
                        <dt>Nivel</dt>
                        <dd>{{ $item->level }}</dd>
                        <dt>Honorario</dt>
                        <dd>${{ number_format($item->fee, 2, '.', ',') }}</dd>
                        <dt>Activo?</dt>
                        <dd>{{ ($item->is_active == TRUE) ? 'Sí' : 'No' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
