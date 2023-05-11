@extends('layouts.resource')

@section('resource-content')

    @section('resource-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#consultations" data-toggle="tab">Consultas</a></li>
                        <li><a href="#treatments" data-toggle="tab">Tratamientos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="consultations">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Paciente</th>
                                        <th>Tipo</th>
                                        <th>Eliminado</th>
                                        <th>Autor</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $items[1]['consultations']->sortByDesc('patient_id') as $consultation )
                                    <tr>
                                        <td><a href="{{ route('patients.show', $consultation->patient->id ) }}" target="_blank">{{ $consultation->patient->id }}</a></td>
                                        <td><a href="{{ route('patients.show', $consultation->patient->id ) }}" target="_blank">{{ $consultation->patient->first_name . ' ' . $consultation->patient->last_name}}</a></td>
                                        <td>{{ $consultation->consulta_tipo }}</td>
                                        <td>{{ $consultation->deleted_at->format('Y-m-d') }}</td>
                                        <td>{{ $consultation->deletedby->first_name . ' ' . $consultation->deletedby->last_name }}</td>
                                        <td><a href="{{ route('restore.consultation', $consultation->id ) }}" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> Restaurar</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                        <div class="tab-pane" id="treatments">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Paciente</th>
                                        <th>Tipo</th>
                                        <th>Esquema</th>
                                        <th>Eliminado</th>
                                        <th>Autor</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $items[0]['treatments']->sortByDesc('patient_id') as $treatment )
                                    <tr>
                                        <td><a href="{{ route('patients.show', $treatment->patient->id ) }}" target="_blank">{{ $treatment->patient->id }}</a></td>
                                        <td><a href="{{ route('patients.show', $treatment->patient->id ) }}" target="_blank">{{ $treatment->patient->first_name . ' ' . $treatment->patient->last_name}}</a></td>
                                        <td>{{ $treatment->treatment->description }}</td>
                                        <td>{{ isset( $treatment->protocol_id ) ? $treatment->protocol->name : ''  }}</td>
                                        <td>{{ $treatment->deleted_at->format('Y-m-d') }}</td>
                                        <td>{{ $treatment->deletedby->first_name . ' ' . $treatment->deletedby->last_name }}</td>
                                        <td><a href="{{ route('restore.treatment', $treatment->id ) }}" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> Restaurar</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection
