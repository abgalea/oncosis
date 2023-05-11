<div class="row">
    <div class="col-md-7 col-lg-8">
        <div class="m-b-md">
            <h2>Paciente: {{ $item->first_name }} {{ $item->last_name }}</h2>
        </div>
        <dl class="dl-horizontal">
            <dt>Estado:</dt>
            <dd>
                @if ($item->is_dead)
                <span class="label label-danger">FALLECIDO</span>
                @else
                    @if ($item->is_active)
                    <span class="label label-primary">ACTIVO</span>
                    @else
                    <span class="label label-warning">INACTIVO</span>
                    @endif
                @endif
                @if ($item->has_weight_warning)
                <span class="label label-danger">DESCENSO PESO</span>
                @endif
            </dd>
        </dl>
    </div>
    <div class="col-md-5 col-lg-4 text-right">
        @if ($current_section == 'patient.treatment')
        {{-- <a class="btn btn-default" href="{{ route('patients.treatment.pdf', $item->id) }}"><i class="fa fa-print fa-fw"></i>Imprimir</a> --}}
        <a data-toggle="modal" data-target="#printTreatmentModal" class="btn btn-default"><i class="fa fa-print fa-fw"></i>Imprimir</a>
        @endif
        @if ($current_section == 'patient.show')
        {{-- <a class="btn btn-default" href="{{ route('patients.history.pdf', $item->id) }}"><i class="fa fa-print fa-fw"></i>Imprimir</a> --}}
        <a data-toggle="modal" data-target="#historyModal" class="btn btn-default"><i class="fa fa-print fa-fw"></i>Imprimir</a>
        @endif
        @if ($current_section == 'patient.pending_payment')
        <a class="btn btn-default" href="{{ route('patients.payment.pdf', $item->id) }}"><i class="fa fa-print fa-fw"></i>Imprimir</a>
        @endif
        <a class="btn btn-default" href="{{ route($routes['edit'], $item->id) }}"><i class="fa fa-edit fa-fw"></i>Editar Paciente</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-5">
        <dl class="dl-horizontal">
            <dt>Nro. Documento:</dt> <dd>{{ $item->id_number }}</dd>
            <dt>Fecha Nacimiento:</dt> <dd>{{ $item->date_of_birth }}</dd>
            <dt>Sexo:</dt> <dd>{{ ucwords($item->sex) }}</dd>
            <dt>Edad:</dt> <dd>{{ $item->age }}</dd>
            <dt>Seguro:</dt> <dd>{{ implode(',', $item->insurance_providers->lists('name')->toArray()) }}</dd>
            <dt>Nro. Seguro:</dt> <dd>{{ $item->insurance_id }}</dd>
        </dl>
    </div>
    <div class="col-lg-7" id="cluster_info">
        <dl class="dl-horizontal">
            <dt><strong>Primera Consulta:</strong></dt> <dd>{{ $item->first_consultation }}</dd>
            <dt><strong>Dirección:</strong></dt> <dd>{{ $item->address }}</dd>
            <dt><strong>Ciudad:</strong></dt> <dd>{{ $item->city }}</dd>
            <dt><strong>Provincia:</strong></dt> <dd>{{ $item->state }}</dd>
            <dt><strong>Teléfono:</strong></dt> <dd>{{ $item->phone_number }}</dd>
            <dt><strong>Ocupación:</strong></dt> <dd>{{ $item->occupation }}</dd>
        </dl>
    </div>
</div>
