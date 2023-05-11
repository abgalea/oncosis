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


            <tr>
                <th style="width: 35%;">Fecha Nacimiento</th>
                <th style="width: 35%;">Seguro</th>
                <th style="width: 30%;">Nro. Seguro</th>
            </tr>
            <tr>
                <td>{{ $item->date_of_birth }}</td>
                <td>{{ implode(',', $item->insurance_providers->lists('name')->toArray()) }}</td>
                <td>{{ $item->insurance_id }}</td>
            </tr>


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


            {{-- <tr>
                <th style="width: 50%;">Teléfono</th>
                <th style="width: 50%;">Ocupación</th>
            </tr>
            <tr>
                <td>{{ $item->phone_number }}</td>
                <td>{{ $item->occupation }}</td>
            </tr> --}}
        </table>
        @if (count($item->treatments) > 0)
            @foreach($item->treatments as $patient_treatment)
        <h2>{{ $patient_treatment->tratamiento }} | <label class="badge badge-default">{{ $patient_treatment->protocol->name }}</label></h2>
        <div style="margin-left: .5em;">
            <h3>{{ $patient_treatment->pathology_location->pathology->name }} {{ $patient_treatment->pathology_location->tipo }} </h3>
            <table class="master">
                <tr>
                    <th width="25%">Peso</th>
                    <th width="25%">Altura</th>
                    <th width="25%">Superficie Corporal</th>
                    <th width="25%">Presión Arterial</th>
                </tr>
                <tr>
                    <td>{{ $item->last_consultation->consulta_peso }}</td>
                    <td>{{ $item->last_consultation->consulta_altura }}</td>
                    <td>{{ number_format( (float)$item->last_consultation->consulta_superficie_corporal, 2 ) }}</td>
                    <td>{{ $item->last_consultation->consulta_presion_arterial }}</td>
                </tr>
            </table>
            <h3>Esquema</h3>
            <div class="no-break1" style="background-color: #fff; border: 1px solid #666; padding: 1em; font-size: 1.2em">

                <?php
                    $instrucciones = '';
                    $parts = explode('{{campo}}', $patient_treatment->protocol->instructions);
                    foreach($parts as $index => $part)
                    {
                        $instrucciones .= $part . (isset($patient_treatment->instrucciones[$index]) ? $patient_treatment->instrucciones[$index] : '');
                    }
                ?>
                {!! nl2br($instrucciones) !!}
            </div>

        </div>
            @endforeach
        @else
        <p>No existen tratamientos registrados para este paciente.</p>
        @endif
    </body>
</html>
