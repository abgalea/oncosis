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

            .no-break1 {
                /*background-color: #f9f9f9;*/
                /*border: 1px solid #666;*/
                padding: 1em 0;
                border-bottom: 1px dashed #666;
            }

            .no-break1:last-child {
                border:0;
            }

            .no-break1 h4 {
                margin-bottom:10px;
            }
            .no-break1 p {
                margin-top:0;
            }

            .label {
                display: inline;
                padding: .2em .6em .15em;
                font-weight: 600;
                letter-spacing: .05rem;
                line-height: 1;
                color: #fff;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: .25em;
                text-transform: uppercase;;
                font-size: 80%;
            }
            .label-default {
                background-color: #666;
            }

        </style>
    </head>
    <body>
        <h1 class="text-center">Historial Clinico</h1>
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

        @if( isset( $item->history['antecedentes'] ) )
        <h2>Antecedentes</h2>
        <table class="master">
            <tr>
                <th style="width: 40%;">Cantidad Tabaco</th>
                <th style="width: 40%;">Tiempo Tabaco</th>
                <th style="width: 20%;">Fumado Pasivo</th>
            </tr>
            <tr>
                <td>{{ !empty($item->antecedente_cantidad_tabaco) ? $item->antecedente_cantidad_tabaco : '-' }}</td>
                <td>{{ !empty($item->antecedente_tiempo_tabaco) ? $item->antecedente_tiempo_tabaco : '-' }}</td>
                <td>{{ ($item->antecedente_fumador_pasivo) ? 'Sí' : '-' }}</td>
            </tr>
            <tr>
                <th style="width: 40%;">Cantidad Alcohol</th>
                <th style="width: 40%;">Tiempo Alcohol</th>
                <th style="width: 20%;">Drogas</th>
            </tr>
            <tr>
                <td>{{ !empty($item->antecedente_cantidad_alcohol) ? $item->antecedente_cantidad_alcohol : '-' }}</td>
                <td>{{ !empty($item->antecedente_tiempo_alcohol) ? $item->antecedente_tiempo_alcohol : '-' }}</td>
                <td>{{ ($item->antecedente_drogas) ? 'Sí' : '-' }}</td>
            </tr>
        </table>
        @if( $item->sex == 'femenino' )
        <table class="master">
            <tr>
                <th style="width: 40%;">Menarca</th>
                <th style="width: 40%;">Menospausia</th>
                <th style="width: 20%;">Aborto</th>
            </tr>
            <tr>
                <td>{{ !empty($item->antecedente_menarca) ? $item->antecedente_menarca : '-' }}</td>
                <td>{{ !empty($item->antecedente_menospau) ? $item->antecedente_menospau : '-' }}</td>
                <td>{{ !empty($item->antecedente_aborto) ? $item->antecedente_aborto : '-' }}</td>
            </tr>
        </table>

        <table class="master">
            <tr>
                <th style="width: 25%;">Embarazo</th>
                <th style="width: 25%;">Parto</th>
                <th style="width: 25%;">Lactancia</th>
                <th style="width: 25%;">Anticonceptivos</th>
            </tr>
            <tr>
                <td>{{ !empty($item->antecedente_embarazo) ? $item->antecedente_embarazo : '-' }}</td>
                <td>{{ !empty($item->antecedente_parto) ? $item->antecedente_parto : '-' }}</td>
                <td>{{ ($item->antecedente_lactancia) ? 'Sí' : '-' }}</td>
                <td>{{ !empty($item->antecedente_anticonceptivos) ? ( $item->antecedente_anticonceptivos . ' - ' . $item->antecedente_anticonceptivos_aplicacion ) : '-' }}</td>
            </tr>
        </table>
        @endif
        <table class="master">
            <tr>
                <th style="width: 50%;">Antecedentes Quirúrgicos</th>
                <th style="width: 50%;">Antecedentes Familiares Oncológicos</th>
            </tr>
            <tr>
                <td>{{ !empty($item->antecedente_quirurgicos) ? $item->antecedente_quirurgicos : '-' }}</td>
                <td>{{ !empty($item->antecedente_familiar_oncologico) ? $item->antecedente_familiar_oncologico : '-' }}</td>
            </tr>
        </table>

        @endif

        @if( isset( $item->history['consultas'] ) && count($item->history['consultas']['items']) > 0 )
        <h2>Consultas</h2>
        <div class="container">
            @foreach($item->history['consultas']['items'] as $history_item)
            <div class="no-break1">
                <h4 style="margin-top:0; padding-top:0">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</h4>
            @if(!empty($history_item->item_titulo))
                <h4 style="margin-top:0; padding-top: 0;">{!! $history_item->item_titulo !!}</h4>
            @endif

                <table>

                    <tr>
                        <td><strong>Peso:</strong> {{ $history_item->consulta_peso }}</td>
                        <td><strong>Altura:</strong> {{ $history_item->consulta_altura }}</td>
                        <td><strong>Sup. Corp.:</strong> {{ number_format((float)$history_item->consulta_superficie_corporal, 2) }}</td>
                        <td><strong>Presión Art.:</strong> {{ $history_item->consulta_presion_arterial }}</td>
                    </tr>
                </table>

                <h4 style="margin-bottom:0; padding-bottom:0;">Resumen</h4>
                {!! $history_item->item_notas !!}

                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->diffForHumans() }} <br/>
                <small>{{ $history_item->updated }} el {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</small>
            </div>
            @endforeach
        </div>
        @endif

        @if( isset( $item->history['localizacion'] ) && count($item->history['localizacion']['items']) > 0 )
        <h2>Localizaci&oacute;n</h2>
        <div class="container">
            @foreach($item->history['localizacion']['items'] as $history_item)
            <div class="no-break1">
                <h4 style="margin-top:0; padding-top:0">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</h4>
            @if(!empty($history_item->item_titulo))
                <h5 style="margin-top:0; padding-top: 0;">{!! $history_item->item_titulo !!}</h5>
            @endif
                {!! $history_item->item_notas !!}

                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->diffForHumans() }} <br/>
                <small>{{ $history_item->updated }} el {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</small>
            </div>
            @endforeach
        </div>
        @endif

        @if( isset( $item->history['metrica'] ) && count($item->history['metrica']['items']) > 0 )
        <h2>F&iacute;sico</h2>
        <div class="container">
            @foreach($item->history['metrica']['items'] as $history_item)
            <div class="no-break1">
                <h4 style="margin-top:0; padding-top:0">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</h4>
                {!! $history_item->item_notas !!}
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->diffForHumans() }} <br/>
                <small>{{ $history_item->updated }} el {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</small>
            </div>
            @endforeach
        </div>
        @endif

        @if( isset( $item->history['estudio'] ) && count($item->history['estudio']['items']) > 0 )
        <h2>Estudios</h2>
        <div class="container">
            @foreach($item->history['estudio']['items'] as $history_item)
            <div class="no-break1">
                <h4 style="margin-top:0; padding-top:0">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</h4>
            @if(!empty($history_item->item_titulo))
                <h5 style="margin-top:0; padding-top: 0;">{!! $history_item->item_titulo !!}</h5>
            @endif
                {!! $history_item->item_notas !!}

                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->diffForHumans() }} <br/>
                <small>{{ $history_item->updated }} el {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</small>
            </div>
            @endforeach
        </div>
        @endif

        @if( isset( $item->history['tratamiento'] ) && count($item->history['tratamiento']['items']) > 0 )
        <h2>Tratamientos</h2>
        <div class="container">
            @foreach($item->history['tratamiento']['items'] as $history_item)
            <div class="no-break1">
                <h4 style="margin-top:0; padding-top:0">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</h4>
            @if(!empty($history_item->item_titulo))
                <h5 style="margin-top:0; padding-top: 0;">{!! $history_item->item_titulo !!} <label class="label label-default">{{$history_item->item_tipo}}</label></h5>
            @endif
                {!! $history_item->item_notas !!}

                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->diffForHumans() }} <br/>
                <small>{{ $history_item->updated }} el {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') }} a las {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history_item->item_fecha)->setTimezone('America/Argentina/Buenos_Aires')->format('h:i a') }}</small>
            </div>
            @endforeach
        </div>
        @endif

    </body>
</html>
