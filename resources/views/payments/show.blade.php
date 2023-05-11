@extends('layouts.resource')

@section('page-title', $title)

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['edit'], $item->id) }}"><i class="fa fa-edit fa-fw"></i>Editar Pago</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <dl class="dl-horizontal">
                        <dt>Obra Social</dt>
                        <dd>{{ $item->insurance_provider->name }}</dd>
                        <dt>Fecha</dt>
                        <dd>{{ $item->payment_date->format('d/m/Y') }}</dd>
                        <dt>Período</dt>
                        <dd>{{ $item->payment_month }}/{{ $item->payment_year }}</dd>
                        <dt>Total</dt>
                        <dd>${{ number_format($item->total, 0, ',', '.') }}</dd>
                        <dt>Observaciones</dt>
                        <dd>{!! nl2br(e($item->notes)) !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
