@extends('layouts.resource')

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['create']) }}"><i class="fa fa-plus fa-fw"></i>Nueva Orden</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form action="{{ route($routes['index']) }}" role="form" class="form-inline text-right">
                        <div class="form-group">
                            Estado
                            {{ Form::select('paid', $paid, $current_paid, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            Período
                            {{ Form::select('month', $months, $current_month, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::select('year', $years, $current_year, ['class' => 'form-control']) }}
                        </div>
                        <button class="btn btn-white" type="submit">Filtrar</button>
                    </form>
                    <div class="text-right">
                        {!! $items->appends(Request::input())->render() !!}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Nro Orden</th>
                                    <th>Obra Social</th>
                                    <th>Práctica</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-right">Total</th>
                                    <th class="text-center">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route($routes['show'], $item->id) }}">
                                            {{ $item->id }}
                                        </a>
                                    </td>
                                    <td>{{ $item->provider->name }}</td>
                                    <td>x{{ $item->quantity }} ({{ $item->practice->short_code }}) {{ $item->practice->description }}</td>
                                    <td class="text-center">{{ $item->order_date->format('d/m/Y') }}</td>
                                    <td class="text-right">${{ number_format($item->total, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        @if ($item->paid)
                                        <span class="label label-primary">Pagado</span>
                                        @else
                                        <span class="label label-warning">Pendiente</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route($routes['show'], $item->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye fa-fw"></i></a>
                                            <a href="{{ route($routes['edit'], $item->id) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i></a>
                                            <a href="#" class="btn btn-warning btn-xs btn-destroy" data-item-id="{{ $item->id }}" data-action-target="{{ route($routes['destroy'], $item->id) }}" data-item-type="Obra Social"><i class="fa fa-times fa-fw"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        {!! $items->appends(Request::input())->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
