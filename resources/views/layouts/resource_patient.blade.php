@extends('layouts.app')

@section('page-title', $title)

@section('after-css')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@endsection

@section('content')
    <div id="patient-resource">



        <div id="patient-quick-add" class="row wrapper hide" style="padding-bottom: 3em;">



            <div class="row" style="margin-top: 1em;">
                <div class="col-lg-4 text-left">
                    <h3 style="font-size: 22px;">Crear</h3>
                </div>
                <div class="col-lg-4 text-center">
                    <select name="tipo" class="form-control" v-select="tipo">
                        <option value="" selected="selected" disabled>Seleccionar...</option>
                        <option value="consultas">Consulta</option>
                        <option value="estudios">Estudios</option>
                        <option value="fisico">Físico</option>
                        <option value="localizacion_tumoral">Localización Tumoral</option>
                        <option value="tratamiento">Tratamiento</option>
                    </select>
                </div>
                <div class="col-lg-4 text-right">
                    <button class="btn btn-default" @click.prevent="cerrarQuickAdd">Cerrar</button>
                </div>
            </div>
            <div class="row" v-show="tipo == 'consultas'">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('fecha_diagnostico', null, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha', 'v-model' => 'consulta.fecha']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            @foreach($consultations as $key => $value )
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="{{$key}}" v-model="consulta.tipo" > {{$value}}
                            </label>
                            @endforeach
                            {{--  <label class="radio-inline">
                                <input type="radio" name="tipo" value="SEGUIMIENTO" v-model="consulta.tipo" checked="checked"> Seguimiento
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="PRIMERA VEZ" v-model="consulta.tipo"> Primera Vez
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="RECAIDA" v-model="consulta.tipo"> Recaida
                            </label>  --}}
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Peso</label>
                                    {!! Form::number('peso', null, ['class' => 'form-control', 'placeholder' => 'Peso', 'v-model' => 'consulta.peso', 'step' => '0.01']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Altura</label>
                                    {!! Form::number('altura', null, ['class' => 'form-control', 'placeholder' => 'Ej: 1.65', 'v-model' => 'consulta.altura', 'step' => '0.01']) !!}

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Presión Arterial</label>
                                    {!! Form::text('presion_arterial', null, ['class' => 'form-control', 'placeholder' => 'Presión Arterial', 'v-model' => 'consulta.presion_arterial']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Institución</label>
                            {!! Form::select('institucion', $selectors['providers'], null, ['class' => 'form-control', 'placeholder' => 'Institución', 'v-model' => 'consulta.institucion']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Resumen</label>
                            {!! Form::textarea('consulta_resumen', null, ['class' => 'form-control redactor', 'placeholder' => 'Resumen', 'v-model' => 'consulta.resumen']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Cobrable</label>
                            <br>
                            {!! Form::checkbox('cobrable', 1, false, ['class' => 'js-switch', 'v-model' => 'consulta.cobrable']) !!}
                        </div>
                        @if (count($item->insurance_providers) > 0)
                        <div class="form-group">
                            <label class="control-label">Obra Social para Pago</label>
                            {!! Form::select('obra_social', $item->insurance_providers->lists('name', 'id')->toArray(), null, ['class' => 'form-control', 'placeholder' => 'Obra Social', 'v-model' => 'consulta.obra_social']) !!}
                        </div>
                        @else
                        <div class="alert alert-info">
                            <a href="{{ route('patients.edit', $item->id) }}">El Paciente no registra Obra Social. Click aquí para definir una o más Obras Sociales para este Paciente.</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" v-show="tipo == 'estudios'">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('fecha_diagnostico', null, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha', 'v-model' => 'estudios.fecha']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#" class="control-label">Imágenes</label>
                            <br>

                            <div class="fileinput fileinput-new input-group" data-provides="fileinput" v-for="(img, index) in estudios.rowImages">
                                <div class="form-control" data-trigger="fileinput">
                                    <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Elija una im&aacute;gen</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                    <input type="file" @change="onFileChanged" :key="index">
                                </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>

                            <button class="button btn-info btn-xs" @click="addRowImage('estudios')">Agregar Imagen</button>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Recaida</label>
                                    <br>
                                    {!! Form::checkbox('recaida', 1, null, ['class' => 'js-switch', 'v-model' => 'estudios.recaida']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">RC</label>
                                    <br>
                                    {!! Form::checkbox('rc', 1, null, ['class' => 'js-switch', 'v-model' => 'estudios.rc']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">RP</label>
                                    <br>
                                    {!! Form::checkbox('rp', 1, null, ['class' => 'js-switch', 'v-model' => 'estudios.rp']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">EE</label>
                                    <br>
                                    {!! Form::checkbox('ee', 1, null, ['class' => 'js-switch', 'v-model' => 'estudios.ee']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Progresi&oacute;n</label>
                                    <br>
                                    {!! Form::checkbox('progresion', 1, null, ['class' => 'js-switch', 'v-model' => 'estudios.progresion']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Patología</label>
                            <div class="clearfix"></div>
                            {{-- {{ dd( $selectors['pathologies'] )}} --}}
                            <select v-select="estudios.patologia" name="pathology_id" class="form-control">
                                <option value></option>
                                @foreach( $localizacion_patologias as $key => $value )
                                <option value="{{ $key }}">{{$value}}</option>
                                @endforeach
                            </select>
                            {{-- {!! Form::select('pathology_id', $selectors['pathologies'], NULL, ['class' => 'form-control select2', 'placeholder' => 'Patología', 'required', 'style' => 'width: 100%', 'v-select' => 'localizacion_tumoral.patologia']) !!} --}}
                        </div>


                        <div class="form-group">
                            <label class="control-label">Detalle</label>
                            {!! Form::textarea('estudio_detalle', null, ['class' => 'form-control redactor', 'placeholder' => 'Detalle', 'v-model' => 'estudios.detalle']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Laboratorio</label>
                            {!! Form::textarea('estudio_laboratorio', null, ['class' => 'form-control redactor', 'placeholder' => 'Laboratorio', 'v-model' => 'estudios.laboratorio']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-show="tipo == 'fisico'">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('fecha', null, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha', 'v-model' => 'fisico.fecha']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Físico Completo</label>
                                    <br>
                                    {!! Form::checkbox('completo', 1, false, ['class' => 'js-switch', 'v-model' => 'fisico.completo']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Recaida</label>
                                    <br>
                                    {!! Form::checkbox('recaida', 1, false, ['class' => 'js-switch', 'v-model' => 'fisico.recaida']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Peso</label>
                                    {!! Form::text('peso', null, ['class' => 'form-control', 'placeholder' => 'Peso', 'v-model' => 'fisico.peso']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Altura</label>
                                    {!! Form::number('altura', null, ['class' => 'form-control', 'placeholder' => 'Ej: 1.65', 'v-model' => 'fisico.altura', 'step' => '0.01']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Temperatura</label>
                                    {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Temperatura', 'v-model' => 'fisico.temperatura']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Presion Arterial</label>
                                    {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Presion Arterial', 'v-model' => 'fisico.presion_arterial']) !!}
                                </div>
                            </div>
                        </div>
                        <div v-show="fisico.completo == true">
                            <div class="form-group">
                                <label class="control-label">Performance</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Performance', 'v-model' => 'fisico.performance']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">FC</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'TA', 'v-model' => 'fisico.ta']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cabeza</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Cabeza', 'v-model' => 'fisico.cabeza']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cuello</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Cuello', 'v-model' => 'fisico.cuello']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Torax</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Torax', 'v-model' => 'fisico.torax']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Abdomen</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Torax', 'v-model' => 'fisico.abdomen']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Urogenital</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Urogenital', 'v-model' => 'fisico.urogenital']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tacto Rectal</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Tacto Rectal', 'v-model' => 'fisico.tacto_rectal']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tacto Vaginal</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Tacto Vaginal', 'v-model' => 'fisico.tacto_vaginal']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mama</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Mama', 'v-model' => 'fisico.mama']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Neurológico</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Neurológico', 'v-model' => 'fisico.neurologico']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Locomotor</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Locomotor', 'v-model' => 'fisico.locomotor']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Linfogangliar</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Linfogangliar', 'v-model' => 'fisico.linfogangliar']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">T.C.S.</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'T.C.S.', 'v-model' => 'fisico.tcs']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Piel</label>
                                {!! Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => 'Piel', 'v-model' => 'fisico.piel']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-show="tipo == 'localizacion_tumoral'">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('fecha_diagnostico', null, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha', 'v-model' => 'localizacion_tumoral.fecha']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Patología</label>
                            <div class="clearfix"></div>
                            {{-- {{ dd( $selectors['pathologies'] )}} --}}
                            <select v-select="localizacion_tumoral.patologia" name="pathology_id" class="form-control">
                                <option value></option>
                                @foreach( $selectors['pathologies'] as $key => $value )
                                <option value="{{ $key }}">{{$value}}</option>
                                @endforeach
                            </select>
                            {{-- {!! Form::select('pathology_id', $selectors['pathologies'], NULL, ['class' => 'form-control select2', 'placeholder' => 'Patología', 'required', 'style' => 'width: 100%', 'v-select' => 'localizacion_tumoral.patologia']) !!} --}}
                        </div>

                        <div class="form-group">
                            <label for="#" class="control-label">Im&aacute;genes</label>
                            <br>

                            <div class="fileinput fileinput-new input-group" data-provides="fileinput" v-for="(img, index) in localizacion_tumoral.rowImages">
                                <div class="form-control" data-trigger="fileinput">
                                    <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Elija una im&aacute;gen</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                    <input type="file" @change="onFileChanged" :key="index">
                                </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>

                            <button class="button btn-info btn-xs" @click="addRowImage('localizacion_tumoral')">Agregar Imagen</button>

                        </div>

                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="Primario" v-model="localizacion_tumoral.tipo"> Primario
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="Segundo Primario" v-model="localizacion_tumoral.tipo"> Segundo Primario
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="Metastasis" v-model="localizacion_tumoral.tipo"> Metastasis
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="Recaida" v-model="localizacion_tumoral.tipo"> Recaida
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Número</label>
                                    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Número', 'v-model' => 'localizacion_tumoral.numero']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group" v-show="localizacion_tumoral.tipo == 'Metastasis' || localizacion_tumoral.tipo == 'Recaida'">
                            <label class="control-label">Sitio</label>
                            {!! Form::text('ubicacion', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'v-model' => 'localizacion_tumoral.ubicacion']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Histología</label>
                            {!! Form::textarea('lt_histologia', null, ['class' => 'form-control redactor', 'placeholder' => 'Histología', 'v-model' => 'localizacion_tumoral.histologia']) !!}
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="tipo" value="Primario" v-model="localizacion_tumoral.biopsia"> Biopsia Quirúrguica
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="tipo" value="Metastasis" v-model="localizacion_tumoral.pag"> PAG
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="tipo" value="Recaida" v-model="localizacion_tumoral.paf"> PAF
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Estadio</label>
                                    {!! Form::text('estadio', null, ['class' => 'form-control', 'placeholder' => 'Estadio', 'v-model' => 'localizacion_tumoral.estadio']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">T</label>
                                    {!! Form::text('campo_t', null, ['class' => 'form-control', 'placeholder' => 'T', 'v-model' => 'localizacion_tumoral.t']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">N</label>
                                    {!! Form::text('campo_n', null, ['class' => 'form-control', 'placeholder' => 'N', 'v-model' => 'localizacion_tumoral.n']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">M</label>
                                    {!! Form::text('campo_m', null, ['class' => 'form-control', 'placeholder' => 'M', 'v-model' => 'localizacion_tumoral.m']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">InmunoHistoQuímica</label>
                            {!! Form::textarea('lt_inmunohistoquimica', null, ['class' => 'form-control redactor', 'placeholder' => 'InmunoHistoQuímica', 'v-model' => 'localizacion_tumoral.inmunohistoquimica']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Receptores Hormonales</label>
                            {!! Form::textarea('lt_receptores_hormonales', null, ['class' => 'form-control redactor', 'placeholder' => 'Receptores Hormonales', 'v-model' => 'localizacion_tumoral.receptores_hormonales']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Estrógeno</label>
                            {!! Form::text('estrogeno', null, ['class' => 'form-control', 'placeholder' => 'Estrógeno', 'v-model' => 'localizacion_tumoral.estrogeno']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Biología Molecular</label>
                            {!! Form::textarea('lt_biologia_molecular', null, ['class' => 'form-control redactor', 'placeholder' => 'Biología Molecular', 'v-model' => 'localizacion_tumoral.biologia_molecular']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Progesterona</label>
                            {!! Form::text('progesterona', null, ['class' => 'form-control', 'placeholder' => 'Progesterona', 'v-model' => 'localizacion_tumoral.progesterona']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Índice Proliferación</label>
                            {!! Form::text('indice_proliferacion', null, ['class' => 'form-control', 'placeholder' => 'Índice Proliferación', 'v-model' => 'localizacion_tumoral.indice_proliferacion']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Observaciones</label>
                            {!! Form::textarea('lt_detalles', null, ['class' => 'form-control redactor', 'placeholder' => 'Detalles', 'v-model' => 'localizacion_tumoral.detalles']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-show="tipo == 'tratamiento'">

                @if(isset($item) && isset( $item->last_consultation ))
                <div id="patient-modal-info">
                    <h3>{{ $item->first_name . ' ' . $item->last_name }}</h3>
                    <ul>
                        <li>Peso: <strong>{{ $item->last_consultation->consulta_peso }}</strong></li>
                        <li>Altura: <strong>{{ $item->last_consultation->consulta_altura }}</strong></li>
                        <li>Sup. Corp: <strong>{{ round( $item->last_consultation->consulta_superficie_corporal, 2) }}</strong></li>
                    </ul>
                </div>

                @endif

                <div class="col-md-6 col-md-offset-3">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label">Fecha Inicio</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('fecha_inicio', null, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha Inicio', 'v-model' => 'tratamiento.fecha_inicio', 'readonly' => true ]) !!}
                            </div>
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento != 8">
                            <label class="control-label">Fecha Fin</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('fecha_fin', null, ['class' => 'form-control date-picker', 'placeholder' => 'Fecha Fin', 'v-model' => 'tratamiento.fecha_fin', 'readonly' => true ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Recaida</label>
                            <br>
                            {!! Form::checkbox('recaida', 1, null, ['class' => 'js-switch', 'v-model' => 'tratamiento.recaida']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sin Obra Social?</label>
                            <br>
                            {!! Form::checkbox('sin_obra_social', 1, null, ['class' => 'js-switch', 'v-model' => 'tratamiento.sin_obra_social']) !!}
                        </div>
                        <div v-show="tratamiento.sin_obra_social != true">
                            @if (count($item->insurance_providers) > 0)
                            <div class="form-group">
                                <label class="control-label">Obra Social</label>
                                <select name="insurance_provider_id" v-select="tratamiento.insurance_provider_id" class="form-control">
                                    <option value></option>
                                    @foreach( $item->insurance_providers->lists('name', 'id')->toArray() as $key => $value )
                                    <option value="{{ $key }}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @else
                            <div class="alert alert-info">
                                <a href="{{ route('patients.edit', $item->id) }}">El Paciente no registra Obra Social. Click aquí para definir una o más Obras Sociales para este Paciente.</a>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">Institución</label>
                            {!! Form::select('institucion', $selectors['providers'], null, ['class' => 'form-control', 'placeholder' => 'Institución', 'v-model' => 'tratamiento.institucion']) !!}
                        </div>


                        <div class="form-group">
                            <label class="control-label">Cobrable</label>
                            <br>
                            {!! Form::checkbox('cobrable', 1, false, ['class' => 'js-switch', 'v-model' => 'tratamiento.cobrable']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label">Localización Patología</label>
                            <select name="pathology_location_id" v-select="tratamiento.pathology_location_id" class="form-control">
                                <option value></option>
                                @foreach( $localizacion_patologias as $key => $value )
                                <option value="{{ $key }}">{{$value}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Tratamiento</label>
                            {!! Form::select('tratamiento', $treatments, null, ['class' => 'form-control', 'placeholder' => 'Tratamiento', 'v-model' => 'tratamiento.tratamiento']) !!}
                        </div>

                        <div class="row" v-show="tratamiento.tratamiento == 8 || tratamiento.tratamiento == 10">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Paliativa</label>
                                    <br>
                                    {!! Form::checkbox('paleativa', 1, null, ['class' => 'js-switch', 'v-model' => 'tratamiento.paleativa']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">RC</label>
                                    <br>
                                    {!! Form::checkbox('rc', 1, null, ['class' => 'js-switch', 'v-model' => 'tratamiento.rc']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">RP</label>
                                    <br>
                                    {!! Form::checkbox('rp', 1, null, ['class' => 'js-switch', 'v-model' => 'tratamiento.rp']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group" v-show="tratamiento.tratamiento != 8">
                            <label class="control-label">Tipo</label>
                            {!! Form::select('tipo', ['ADYUVANTE' => 'ADYUVANTE', 'NEOADYUVANTE' => 'NEOADYUVANTE', 'PRIMARIA' => 'PRIMARIA', 'AVANZADO' => 'AVANZADO', 'PALIATIVA' => 'PALIATIVA'], null, ['class' => 'form-control', 'placeholder' => 'Tipo', 'v-model' => 'tratamiento.tipo']) !!}
                        </div>

                        <div class="form-group" v-show="tratamiento.tratamiento == 8">
                            <label class="control-label">Tipo</label>
                            {!! Form::select('tipo', ['CURATIVA' => 'CURATIVA', 'PALIATIVA' => 'PALIATIVA'], null, ['class' => 'form-control', 'placeholder' => 'Tipo', 'v-model' => 'tratamiento.tipo']) !!}
                        </div>


                        <div class="form-group" v-show="tratamiento.tratamiento != 8 && tratamiento.tratamiento != 3">
                            <label class="control-label">Ciclos</label>
                            {!! Form::text('ciclos', null, ['class' => 'form-control', 'placeholder' => 'Ciclos', 'v-model' => 'tratamiento.ciclos']) !!}
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento == 10 || tratamiento.tratamiento == 'DROGAS TARGET'">
                            <label class="control-label">Dosis diaria</label>
                            {!! Form::text('dosis_diaria', null, ['class' => 'form-control', 'placeholder' => 'Dosis diaria', 'v-model' => 'tratamiento.dosis_diaria']) !!}
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento == 10">
                            <label class="control-label">Dosis total</label>
                            {!! Form::text('dosis_total', null, ['class' => 'form-control', 'placeholder' => 'Dosis total', 'v-model' => 'tratamiento.dosis_total']) !!}
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento == 10">
                            <label class="control-label">Boost</label>
                            {!! Form::text('boost', null, ['class' => 'form-control', 'placeholder' => 'Boost', 'v-model' => 'tratamiento.boost']) !!}
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento == 10">
                            <label class="control-label">Braquiterapia</label>
                            <br>
                            {!! Form::checkbox('braquiterapia', 1, null, ['class' => 'js-switch', 'v-model' => 'tratamiento.braquiterapia']) !!}
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento == 10 || tratamiento.tratamiento != 8">
                            <label class="control-label">Dosis</label>
                            {!! Form::text('dosis', null, ['class' => 'form-control', 'placeholder' => 'Dosis', 'v-model' => 'tratamiento.dosis']) !!}
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento != 10 && tratamiento.tratamiento != 8">
                            <label class="control-label">Esquema</label>
                            <select name="protocol_id" v-select="tratamiento.protocol_id" class="form-control">
                                <option value></option>
                                @foreach( $protocols as $key => $value )
                                <option value="{{ $key }}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ibox" v-show="tratamiento.protocol_id != ''">
                            <div class="ibox-content">
                                <div id="protocol-instructions" class="form-inline">@{{{ protocolInstructions }}}</div>
                            </div>
                        </div>
                        <div class="form-group" v-show="tratamiento.tratamiento == 'DROGAS TARGET'">
                            <label class="control-label">Frecuencia</label>
                            {!! Form::text('frecuencia', null, ['class' => 'form-control', 'placeholder' => 'Frecuencia', 'v-model' => 'tratamiento.frecuencia']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Detalle / Observaciones</label>
                            {!! Form::textarea('t_observaciones', null, ['class' => 'form-control redactor', 'placeholder' => 'Laboratorio', 'v-model' => 'tratamiento.observaciones']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" v-show="tipo == 'consultas' || tipo == 'estudios' || tipo == 'fisico' || tipo == 'localizacion_tumoral' || tipo == 'tratamiento'">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group text-right">
                        <button id="quickAddButton" class="btn btn-primary" @click.prevent="procesarQuickAdd">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="patient-details">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-md-7 col-lg-8">
                    <h2>{!! $title !!} <span class="badge badge-default">ID: {{ $item->id }}</span></h2>
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
                <div class="col-md-5 col-lg-4">
                    <div class="title-action">
                        <a class="btn btn-primary" @click.prevent="openQuickAdd"><i class="fa fa-plus fa-fw"></i>Crear</a>

                        {{-- @yield('action-buttons') --}}
                    </div>

                </div>
            </div>

            <div class="row">
                <ul class="nav nav-pills patient-menu">
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.show') class="active" @endif><a href="{{ route('patients.show', ['id' => $item->id]) }}">Historia Clínica</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.background') class="active" @endif><a href="{{ route('patients.background.show', ['id' => $item->id]) }}">Antecedentes</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.consultation') class="active" @endif><a href="{{ route('patients.consultation.show', ['id' => $item->id]) }}">Consultas</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.pathology') class="active" @endif><a href="{{ route('patients.pathology.show', ['id' => $item->id]) }}">Patología</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.location') class="active" @endif><a href="{{ route('patients.location.show', ['id' => $item->id]) }}">Localización</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.physical') class="active" @endif><a href="{{ route('patients.physical.show', ['id' => $item->id]) }}">Físico</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.study') class="active" @endif><a href="{{ route('patients.studies.show', ['id' => $item->id]) }}">Estudios</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.treatment') class="active" @endif><a href="{{ route('patients.treatment.show', ['id' => $item->id]) }}">Tratamiento</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.relapse') class="active" @endif><a href="{{ route('patients.relapse.show', ['id' => $item->id]) }}">Recaída</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.pending_payment') class="active" @endif><a href="{{ route('patients.pending_payment.show', ['id' => $item->id]) }}">Pagos</a></li>
                    <li role="presentation" @if (isset($current_section) AND $current_section == 'patient.closure') class="active" @endif><a href="{{ route('patients.closure.show', ['id' => $item->id]) }}">Cierre</a></li>
                </ul>
            </div>

            <div class="wrapper wrapper-content">
                @yield('resource-content')
            </div>
        </div>
    </div>
@endsection

@section('after-script-app')
    @parent
    @if (env('APP_DEBUG'))
    <script src="{{ asset('js/vue.js') }}"></script>
    @else
    <script src="{{ asset('js/vue.min.js') }}"></script>
    @endif
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script>
        var baseURL = '{{ url('/') }}';
        var patientID = {{ (isset($item) ? $item->id : null )}};
        var protocols = {!! $protocols_json !!};
    </script>
    <script src="{{ asset('js/patient.js') }}"></script>
@endsection
