@extends('layouts.resource')

@section('resource-content')

    @section('resource-tabs')
    <div class="row">
        <ul class="nav nav-pills patient-menu">
            <li role="presentation" @if (isset($current_section) AND $current_section=='reports.patients' ) class="active" @endif><a href="{{ route('reports.patients' ) }}">Listado de Pacientes</a></li>
            <li role="presentation" @if (isset($current_section) AND $current_section=='reports.economics' ) class="active" @endif><a href="{{ route('reports.economics') }}">Reporte Econ&oacute;mico</a></li>
        </ul>
    </div>
    @endsection

    @section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th class="text-right">Edad</th>
                                    <th class="text-right">Patologia</th>
                                    <th class="text-right">Obra Social</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection
