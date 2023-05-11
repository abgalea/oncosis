@extends('layouts.app')
@section('page-title', $title)

@section('content')
<div id="report-resource">
    <div id="report-page">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-12">
                <h2>{!! $title !!}</h2>
                @if (count($breadcrumbs) > 0)
                <ol class="breadcrumb">
                    @foreach($breadcrumbs as $breadcrumb)
                    <li class="{{ (isset($breadcrumb['class'])) ? $breadcrumb['class'] : '' }}">
                        <a href="{{ (isset($breadcrumb['route'])) ? route($breadcrumb['route'], isset($breadcrumb['route_params']) ? $breadcrumb['route_params'] : []) : url($breadcrumb['url']) }}">{{ $breadcrumb['title'] }}</a>
                    </li>
                    @endforeach
                </ol>
                @endif
            </div>

        </div>

        <div class="row">
            <ul class="nav nav-pills patient-menu">
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.show' ) class="active" @endif><a href="{{ route('patients.show', ['id' => $item->id]) }}">Historia Clínica</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.background' ) class="active" @endif><a href="{{ route('patients.background.show', ['id' => $item->id]) }}">Antecedentes</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.consultation' ) class="active" @endif><a href="{{ route('patients.consultation.show', ['id' => $item->id]) }}">Consultas</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.pathology' ) class="active" @endif><a href="{{ route('patients.pathology.show', ['id' => $item->id]) }}">Patología</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.location' ) class="active" @endif><a href="{{ route('patients.location.show', ['id' => $item->id]) }}">Localización</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.physical' ) class="active" @endif><a href="{{ route('patients.physical.show', ['id' => $item->id]) }}">Físico</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.study' ) class="active" @endif><a href="{{ route('patients.studies.show', ['id' => $item->id]) }}">Estudios</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.treatment' ) class="active" @endif><a href="{{ route('patients.treatment.show', ['id' => $item->id]) }}">Tratamiento</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.relapse' ) class="active" @endif><a href="{{ route('patients.relapse.show', ['id' => $item->id]) }}">Recaída</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.pending_payment' ) class="active" @endif><a href="{{ route('patients.pending_payment.show', ['id' => $item->id]) }}">Pagos</a></li>
                <li role="presentation" @if (isset($current_section) AND $current_section=='patient.closure' ) class="active" @endif><a href="{{ route('patients.closure.show', ['id' => $item->id]) }}">Cierre</a></li>
            </ul>
        </div>

        <div class="wrapper wrapper-content">
            @yield('resource-content')
        </div>
    </div>
</div>
@endsection
