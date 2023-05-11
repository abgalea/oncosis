<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Datos del Tratamiento</title>
    <style type="text/css">
        * {
            font-family: Arial, sans-serif;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .no-break {
            page-break-inside: avoid;
        }
        h1 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 0;
        }
        h2 {
            font-size: 18px;
            font-weight: bold;
            border: 1px solid #333;
            background-color: #ededed;
            padding: 3px;
        }
        h3 {
            font-size: 18px;
            font-weight: bold;
        }
        table {
            width: 100%;
        }
        tr {
            page-break-inside: avoid
        }
        th {
            text-align: left;
            font-weight: bold;
            vertical-align: top;
        }
        td {
            vertical-align: top;
        }
        table.master {
            border-collapse: collapse;
        }
        table.master th {
            border-bottom: 1px solid #666;
        }
        table.master th,
        table.master td {}
        table.detail {
            border-collapse: collapse;
        }
        table.detail th,
        table.detail td {
            border: 1px solid #333;
        }
        table.section {
            margin-bottom: 5px;
        }
        p {
            margin: 0 0 4px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h2>DATOS DEL PACIENTE <span class="pull-right"><strong>ID {{ $item->id}}</strong></span></h2>
    <table class="master">
        <tr>
            <th style="width: 35%;">Nombre(s)</th>
            <th style="width: 35%;">Apellidos(s)</th>
            <th style="width: 30%;">Nro. Documento</th>
        </tr>
        <tr>
            <td>{{ $item->first_name }}</td>
            <td>{{ $item->last_name }}</td>
            <td>{{ $item->id_number }}</td>
        </tr>
    </table>
    <table class="master">
        <tr>
            <th style="width: 30%;">Fecha Nacimiento</th>
            <th style="width: 30%;">Seguro</th>
            <th style="width: 30%;">Nro. Seguro</th>
        </tr>
        <tr>
            <td>{{ $item->date_of_birth }}</td>
            <td>{{ implode(',', $item->insurance_providers->lists('name')->toArray()) }}</td>
            <td>{{ $item->insurance_id }}</td>
        </tr>
    </table>
    <table class="master">
        <tr>
            <th style="width: 40%;">Dirección</th>
            <th style="width: 40%;">Ciudad</th>
            <th style="width: 20%;">Provincia</th>
        </tr>
        <tr>
            <td>{{ $item->address }}</td>
            <td>{{ $item->city }}</td>
            <td>{{ $item->state }}</td>
        </tr>
    </table>
    <table class="master">
        <tr>
            <th style="width: 50%;">Teléfono</th>
            <th style="width: 50%;">Ocupación</th>
        </tr>
        <tr>
            <td>{{ $item->phone_number }}</td>
            <td>{{ $item->occupation }}</td>
        </tr>
    </table>
    <h2>Items</h2>
    @if (isset($items))
        @foreach($items as $items)
            @if ($items['type'] == 'consultation')
            <h4>Consulta &mdash; {{ date('d/m/Y', strtotime($items['consulta_fecha'])) }} :: <span class="label label-inverse label-price pull-left">${{ number_format($items['treatment_fee'], 0, '', '.') }}</span></h4>
            <table class="detail no-break">
                <tr>
                    <th colspan="2">Última modificación</th>
                    <th>Modificado por</th>
                    <th>Estado</th>
                </tr>
                <tr>
                    <td colspan="2">{{ $items['updated_at'] }}</td>
                    <td>{{ $items['updatedby']['first_name'] }} {{ $items['updatedby']['last_name'] }}</td>
                    <td>
                        @if ($items['consulta_pagada'])
                        <span class="label label-success">PAGADO</span> @else
                        <span class="label label-warning">PENDIENTE DE PAGO</span> @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Tipo</th>
                    <th colspan="2">Institución</th>
                </tr>
                <tr>
                    <td colspan="2">
                        @if ($items['consulta_tipo'] == 'RECAIDA')
                        <span class="label recaida">RECAIDA</span> @else {{ $items['consulta_tipo'] }} @endif
                    </td>
                    <td colspan="2">{{ $items['provider']['name'] }}</td>
                </tr>
                <tr>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>Sup. Corp</th>
                    <th>Presión Art.</th>
                </tr>
                <tr>
                    <td>{{ $items['consulta_peso'] }}</td>
                    <td>{{ $items['consulta_altura'] }}</td>
                    <td>{{ $items['consulta_superficie_corporal'] }}</td>
                    <td>{{ $items['consulta_presion_arterial'] }}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <strong>Resumen:</strong>
                        <br />
                        {!! $items['consulta_resumen'] !!}
                    </td>
                </tr>
            </table>
            @endif
            @if ($items['type'] == 'treatment')
            <h4>{{ $items['tratamiento_nombre'] }} :: <span class="label label-inverse label-price pull-left">${{ number_format($items['treatment_fee'], 0, '', '.') }}</span></h4>
            <table class="detail no-break">
                <tr>
                    <th colspan="2">Última modificación</th>
                    <th colspan="2">Modificado por</th>
                    <th>Estado</th>
                </tr>
                <tr>
                    <td colspan="2">{{ $items['updated_at'] }}</td>
                    <td colspan="2">{{ $items['updatedby']['first_name'] }} {{ $items['updatedby']['last_name'] }}</td>
                    <td>
                        @if ($items['treatment_payed'])
                        <span class="label label-success">PAGADO</span> @else
                        <span class="label label-warning">PENDIENTE DE PAGO</span> @endif
                    </td>
                </tr>
                <tr>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
                <tr>
                    <td>{{ $items['fecha_inicio'] }}</td>
                    <td>{{ ($items['fecha_fin']) ? $items['fecha_fin'] : 'N/D' }}</td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <th colspan="5">Localización/Patología</th>
                    {{-- <th colspan="1">Ciclos</th> --}}
                </tr>
                <tr>
                    <td colspan="5">{{ $items['pathology_location']['pathology']['name'] }} {{ $items['pathology_location']['tipo'] }}</td>
                    {{-- <td colspan="1">{{ $items['ciclos'] }}</td> --}}
                </tr>
                @if ($items['tratamiento'] == 'RADIOTERAPIA')
                <tr>
                    <th>Dosis Diaria</th>
                    <th>Dosis Total</th>
                    <th>Boost</th>
                    <th>Braquiterapia?</th>
                    <th>Dosis</th>
                </tr>
                <tr>
                    <td>{{ $items['dosis_diaria'] }}</td>
                    <td>{{ $items['dosis_total'] }}</td>
                    <td>{{ $items['boost'] }}</td>
                    <td>{{ ($items['braquiterapia']) ? 'Si' : 'No' }}</td>
                    <td>{{ $items['dosis'] }}</td>
                </div>
                @endif
                @if ($items['tratamiento'] == 'DROGAS TARGET')
                <tr>
                    <th>Dosis Diaria</th>
                    <th>Frecuencia</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
                <tr>
                    <td>{{ $items['dosis_diaria'] }}</td>
                    <td>{{ ($items['frecuencia']) }}</td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                @endif

                @if( isset($items['provider']) && isset($items['provider']['name'] ) )
                <tr>
                    <td colspan="5">
                        <strong>Institución:</strong>
                        <br /> {!! nl2br( $items['provider']['name'] ) !!}
                    </td>
                </tr>
                @endif
                <tr>
                    <td colspan="5">
                        <strong>Observaciones:</strong>
                        <br /> {!! nl2br($items['observaciones']) !!}
                    </td>
                </tr>
            </table>

            @if( !empty($items['plogs']) && count($items['plogs']) > 0)
            <h4>Detalles</h4>

                @foreach($items['plogs'] as $log)
            <table class="detail no-break">
                <tr>
                    <th colspan="2">Iniciado</th>
                    <th colspan="2">Hora</th>
                    <th>Por</th>
                </tr>
                <tr>
                    <td colspan="2">{{ $log->getFormatedDate()->format('d/m/Y') }}</td>
                    <td colspan="2">{{ $log->getFormatedDate()->format('h:i a') }}</td>
                    <td>
                        {{ $log->createdby->first_name }} {{ $log->createdby->last_name }}
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <strong>Comentarios</strong>
                        <br /> {!! nl2br($log->log) !!}
                    </td>
                </tr>
            </table>
                @endforeach
            @endif
            @endif
        @endforeach
    @else
    <p>No existen consultas y/o tratamientos registrados para este paciente.</p>
    @endif
</body>
</html>
