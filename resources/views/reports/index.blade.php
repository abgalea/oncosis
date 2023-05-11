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

@endsection
