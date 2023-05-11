@extends('layouts.app')

@section('page-title', $title)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-md-8 col-lg-8">
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
        <div class="col-md-4 col-lg-4">
            @yield('action-buttons')
        </div>
    </div>

    @yield('resource-tabs')

    <div class="wrapper wrapper-content">
        @yield('resource-content')
    </div>
@endsection
