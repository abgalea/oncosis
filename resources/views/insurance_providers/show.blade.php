@extends('layouts.resource')

@section('page-title', $title)

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['edit'], $item->id) }}"><i class="fa fa-edit fa-fw"></i>Editar Obra Social</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <dl class="dl-horizontal">
                        <dt>Prestador</dt>
                        <dd>{{ ($item->provider) ? $item->provider->name : '' }}</dd>
                        <dt>Nombre</dt>
                        <dd>{{ $item->name }}</dd>
                        <dt>Coseguro</dt>
                        <dd>{{ number_format($item->percentage, 2, '.', ',') }}%</dd>
                        <dt>Precios</dt>
                        <dd>
                            Nivel I - {{ !is_null( $item->level_0 ) ? number_format($item->level_0, 2, '.', ',') : '' }}<br>
                            Nivel II - {{ !is_null( $item->level_1 ) ? number_format($item->level_1, 2, '.', ',') : '' }}<br>
                            Nivel III - {{ !is_null( $item->level_2 ) ? number_format($item->level_2, 2, '.', ',') : '' }}<br>
                            Nivel IV - {{ !is_null( $item->level_3 ) ? number_format($item->level_3, 2, '.', ',') : '' }}<br>
                            Nivel V - {{ !is_null( $item->level_4 ) ? number_format($item->level_4, 2, '.', ',') : '' }}<br>
                            Nivel VI - {{ !is_null( $item->level_5 ) ? number_format($item->level_5, 2, '.', ',') : '' }}<br>
                            Nivel VII - {{ !is_null( $item->level_6 ) ? number_format($item->level_6, 2, '.', ',') : '' }}
                        </dd>
                        <dt>Activo?</dt>
                        <dd>{{ ($item->is_active == TRUE) ? 'Sí' : 'No' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
