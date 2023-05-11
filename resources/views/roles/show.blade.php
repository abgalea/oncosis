@extends('layouts.resource')

@section('page-title', $title)

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['edit'], $item->id) }}"><i class="fa fa-edit fa-fw"></i>Editar Rol</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <dl class="dl-horizontal">
                        <dt>Nombre Corto</dt>
                        <dd>{{ $item->name }}</dd>
                        <dt>Nombre</dt>
                        <dd>{{ $item->display_name }}</dd>
                        <dt>Descripción</dt>
                        <dd>{{ $item->description }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
