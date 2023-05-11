@extends('layouts.resource')

@section('page-title', $title)

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['edit'], $item->id) }}"><i class="fa fa-edit fa-fw"></i>Editar Órden</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <dl class="dl-horizontal">
                        <dt>Obra Social</dt>
                        <dd>{{ $item->provider->name }}</dd>
                        <dt>Fecha Órden</dt>
                        <dd>{{ $item->order_date->format('d/m/Y') }}</dd>
                        <dt>Período</dt>
                        <dd>{{ $item->period_month }}/{{ $item->period_year }}</dd>
                        <dt>Práctica</dt>
                        <dd>{{ $item->practice->short_code }} &dash; {{ $item->practice->description }}</dd>
                        <dt>Cantidad</dt>
                        <dd>{{ $item->quantity }}</dd>
                        <dt>Total</dt>
                        <dd>${{ number_format($item->total, 0, ',', '.') }}</dd>
                        <dt>Pagado?</dt>
                        <dd>{{ ($item->paid == TRUE) ? 'Sí' : 'No' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
