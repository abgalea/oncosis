@extends('layouts.resource')

@section('action-buttons')
    <div class="title-action">
        <a class="btn btn-primary" href="{{ route($routes['create']) }}"><i class="fa fa-plus fa-fw"></i>Nuevo Paciente</a>
    </div>
@endsection

@section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form action="{{ route($routes['index']) }}" class="form form-search" role="form" method="GET">
                        <div class="row">

                            <div class="col-md-1">
                                <input type="text" placeholder="Id" name="filter_patient_id" value="{{ $filter_patient_id }}" class="input form-control">
                            </div>

                            <div class="col-md-2">
                                <input type="text" placeholder="Nombres..." name="filter_firstname" value="{{ $filter_firstname }}" class="input form-control ">
                            </div>
                            <div class="col-md-2">
                                <input type="text" placeholder="Apellidos..." name="filter_lastname" value="{{ $filter_lastname }}" class="input form-control ">
                            </div>
                            <div class="col-md-2">
                                {{ Form::select('filter_insurance', $insurance_providers, $filter_insurance, ['class' => 'form-control filter-insurance'])}}
                            </div>

                            <div class="col-md-3">
                                {{ Form::select('filter_pathology',$selectors['pathologies'], $filter_pathology, ['class' => 'form-control filter-pathology'])}}
                                
                            </div>

                            <div class="col-md-2 text-right">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
                                </span>
                            
                                <span class="input-group-btn">
                                    <a href="{{ route($routes['index']) }}" class="btn btn btn-default">Resetear</a>
                                </span>
                            </div>
                        </div>
                    </form>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-right">ID</th>
                                    <th>Apellido(s)</th>
                                    <th>Nombre(s)</th>
                                    <th>Obra Social</th>
                                    <th class="text-center">Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)

                                <tr>
                                    <td class="text-right">
                                        <a href="{{ route($routes['show'], $item->id) }}">
                                            {{ $item->id }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route($routes['show'], $item->id) }}">
                                            {{ $item->last_name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route($routes['show'], $item->id) }}">
                                            {{ $item->first_name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if (count($item->insurance_providers) > 0)
                                        {{ implode(', ', $item->insurance_providers->lists('name')->toArray()) }}
                                        @else
                                        &mdash;
                                        @endif
                                    </td>
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
                                            <a href="#" class="btn btn-warning btn-xs btn-destroy" data-item-id="{{ $item->id }}" data-action-target="{{ route($routes['destroy'], $item->id) }}" data-item-type="Paciente"><i class="fa fa-times fa-fw"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="pagination">
                                <li class="disabled">
                                    <span>Resultados: {{$items->total()}} Pacientes</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-right">
                             {!! $items->appends(Request::input())->render() !!}
                        </div>
                    </div>
                    <div class="text-right">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
