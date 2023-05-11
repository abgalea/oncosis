<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Datos del Tratamiento</title>
        <style type="text/css">
            * { font-family: Arial, sans-serif; }
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
            tr { page-break-inside: avoid }
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
            table.master td {
            }
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
            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center">HOJA DE TRATAMIENTO</h1>
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
        <h2>Tratamiento(s)</h2>
        @if (count($item->treatments) > 0)
            @foreach($item->treatments as $patient_treatment)
        <h3>{{ $patient_treatment->tratamiento }}</h3>
        <div style="margin-left: 1em;">
            <h4>Datos del Tratamiento</h4>
            <table class="detail no-break">
                <tr>
                    <th>Última modificación</th>
                    <th>Modificado por</th>
                    <th>Estado</th>
                </tr>
                <tr>
                    <td>{{ date(('d/m/Y'), strtotime($patient_treatment->updated_at)) }}</td>
                    <td>{{ $patient_treatment->updatedby->first_name }} {{ $patient_treatment->updatedby->last_name }}</td>
                    <td>
                        @if ($patient_treatment->estado == 'activo')
                        ACTIVO
                        @endif
                        @if ($patient_treatment->estado == 'cerrado')
                        CERRADO
                        @endif
                        @if ($patient_treatment->estado == 'cancelado')
                        CANCELADO
                        @endif
                        @if ($patient_treatment->recaida)
                        RECAIDA
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Localización/Patología</th>
                </tr>
                <tr>
                    <td>{{ $patient_treatment->fecha_inicio }}</td>
                    <td>{{ ($patient_treatment->fecha_fin) ? $patient_treatment->fecha_fin : 'N/D' }}</td>
                    <td>{{ $patient_treatment->pathology_location->pathology->name }} {{ $patient_treatment->pathology_location->tipo }}</td>
                </tr>
                <tr>
                    @if( $patient_treatment->tratamiento != 'CIRUGIA' )
                    <th>Ciclos</th>
                    @endif
                    @if ($patient_treatment->tratamiento == 'RADIOTERAPIA')
                    <th>Dosis diaria</th>
                    <th>Dosis total</th>
                    @elseif ($patient_treatment->tratamiento == 'DROGAS TARGET')
                    <th>Dosis diaria</th>
                    <th>Frecuencia</th>
                    @else
                    <th colspan="2">&nbsp;</th>
                    @endif
                </tr>
                <tr>
                    @if( $patient_treatment->tratamiento != 'CIRUGIA' )
                    <td>{{ $patient_treatment->ciclos }}</td>
                    @endif
                    @if ($patient_treatment->tratamiento == 'RADIOTERAPIA')
                    <td>{{ $patient_treatment->dosis_diaria }}</td>
                    <td>{{ $patient_treatment->dosis_total }}</td>
                    @elseif ($patient_treatment->tratamiento == 'DROGAS TARGET')
                    <td>{{ $patient_treatment->dosis_diaria }}</td>
                    <td>{{ $patient_treatment->frecuencia }}</td>
                    @else
                    <td colspan="2">&nbsp;</td>
                    @endif
                </tr>
                @if ($patient_treatment->tratamiento == 'RADIOTERAPIA')
                <tr>
                    <th>Boost</th>
                    <th>Braquiterapia?</th>
                    <th>Dosis</th>
                </tr>
                <tr>
                    <td>{{ $patient_treatment->boost }}</td>
                    <td>{{ ($patient_treatment->braquiterapia) ? 'Si' : 'No' }}</td>
                    <td>{{ $patient_treatment->dosis }}</td>
                </tr>
                @endif
                <tr>
                    <th colspan="3">Detalle</th>
                </tr>
                <tr>
                    <td colspan="3">{!! nl2br($patient_treatment->observaciones) !!}</td>
                </tr>
            </table>
            @if( isset($item->options) && in_array('protocol', $item->options) )
            <h4>Esquema</h4>
            <div class="no-break1" style="background-color: #ededed; border: 1px solid #666; padding: 1em;">
                <?php
                    $instrucciones = '';
                    $parts = explode('{{campo}}', $patient_treatment->protocol->instructions);
                    foreach($parts as $index => $part)
                    {
                        $instrucciones.= $part . (isset($patient_treatment->instrucciones[$index]) ? $patient_treatment->instrucciones[$index] : '');
                    }
                ?>
                {!! nl2br($instrucciones) !!}
            </div>
            @endif
            @if (count($patient_treatment->logs) > 0 && isset($item->options) && in_array('history', $item->options) )
            <h4>Histórico</h4>
            @foreach($patient_treatment->logs as $log)
            <table class="detail no-break">
                <tr>
                    <th>Iniciado</th>
                    <th>Hora</th>
                    <th>Por</th>
                </tr>
                <tr>
                    <td>{{ $log->created_at->format('d/m/Y') }}</td>
                    <td>{{ $log->created_at->format('h:i a') }}</td>
                    <td>{{ $log->createdby->first_name }} {{ $log->createdby->last_name }}</td>
                </tr>
                <tr>
                    <th>Ciclo</th>
                    <th>Toxicidad</th>
                    <th>Tensión arterial</th>
                </tr>
                <tr>
                    <td>{{ $log->ciclo }}</td>
                    <td>{{ $log->toxicidad }}</td>
                    <td>{{ $log->tension_arterial }}</td>
                </tr>
                <tr>
                    <th>Frecuencia cardíaca</th>
                    <th>Peso</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td>{{ $log->frecuencia_cardiaca }}</td>
                    <td>{{ $log->peso }}</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th colspan="3">Observaciones</th>
                </tr>
                <tr>
                    <td colspan="3">{!! nl2br(e($log->peso)) !!}</td>
                </tr>
            </table>
            @endforeach
            @endif
        </div>
            @endforeach
        @else
        <p>No existen tratamientos registrados para este paciente.</p>
        @endif
    </body>
</html>
