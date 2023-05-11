@extends('layouts.resource')

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['create']) }}"><i class="fa fa-plus fa-fw"></i>Nuevo Esquema</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form action="{{ route($routes['index']) }}" role="form" method="GET">
                        <div class="input-group">
                            <input type="text" placeholder="Buscar..." name="filter" value="{{ $filter }}" class="input form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
                            </span>
                        </div>
                    </form>
                    <div class="text-right">
                        {!! $items->appends(Request::input())->render() !!}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th class="text-center">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        @if ($item->is_active)
                                        <span class="label label-primary">Activo</span>
                                        @else
                                        <span class="label label-warning">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route($routes['show'], $item->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye fa-fw"></i></a>
                                            <a href="{{ route($routes['edit'], $item->id) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i></a>
                                            <a href="#" class="btn btn-warning btn-xs btn-destroy" data-item-id="{{ $item->id }}" data-action-target="{{ route($routes['destroy'], $item->id) }}" data-item-type="Patología"><i class="fa fa-times fa-fw"></i></a>
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
