{{-- <h2>{{ $provider['name'] }} :: {{ $provider['count'] }} Pacientes</h2> --}}
<table>
    <thead>
        @if(!is_null( $provider['dates'] ) )

        <tr>
            <th>Fechas</th>
            <th>&nbsp;</th>
            <th colspan="2">Desde: {{$provider['dates']['sd'] }}</th>
            <th colspan="5">Hasta: {{$provider['dates']['ed'] }}</th>
            <th colspan="3">&nbsp;</th>
        </tr>
        @endif
        <tr>
            <th colspan="12"><h2>{{ $provider['name'] }} :: {{ $provider['count'] }} Pacientes</h2></th>
        </tr>
        <tr>
            <th colspan="3">&nbsp;</th>
            <th>PRECIOS</th>
            <th style="vertical-align: bottom; width: 5px;">{{ $provider['level_0'] }}</th>
            <th style="vertical-align: bottom;">{{ $provider['level_1'] }}</th>
            <th style="vertical-align: bottom;" width="3">{{ $provider['level_2'] }}</th>
            <th style="vertical-align: bottom;">{{ $provider['level_3'] }}</th>
            <th style="vertical-align: bottom;">{{ $provider['level_4'] }}</th>
            <th style="vertical-align: bottom;">{{ $provider['level_5'] }}</th>
            <th style="vertical-align: bottom;">{{ $provider['level_6'] }}</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Apellido(s)</th>
            <th>Nombre(s)</th>
            <th>Edad</th>
            <th width="40" class="text-center">I</th>
            <th width="40" class="text-center">II</th>
            <th width="40" class="text-center">III</th>
            <th width="40" class="text-center">IV</th>
            <th width="40" class="text-center">V</th>
            <th width="40" class="text-center">VI</th>
            <th width="40" class="text-center">VI</th>
            <th class="text-right">Valor $</th>
        </tr>
    </thead>
    <tbody>
        @foreach($provider['patients'] as $patient)
        <tr>
            <td>{{ $patient['id'] }}</td>
            <td>{{ $patient['last_name'] }}</td>
            <td>{{ $patient['first_name'] }}</td>
            <td>{{ $patient['age'] }} a&ntilde;os</td>
            <td width="40" class="text-right">{{ $patient['levels'][0] }}</td>
            <td width="40" class="text-right">{{ $patient['levels'][1] }}</td>
            <td width="40" class="text-right">{{ $patient['levels'][2] }}</td>
            <td width="40" class="text-right">{{ $patient['levels'][3] }}</td>
            <td width="40" class="text-right">{{ $patient['levels'][4] }}</td>
            <td width="40" class="text-right">{{ $patient['levels'][5] }}</td>
            <td width="40" class="text-right">{{ $patient['levels'][6] }}</td>
            <td class="text-right">{{ number_format($patient['amount'], 0, '', '') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
