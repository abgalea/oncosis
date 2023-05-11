@extends('layouts.login')

@section('page-title', 'Recuperar Contraseña')

@section('content')
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">Recuperar Contraseña</h2>
                    <p>Para recuperar su contraseña, ingrese su dirección de email y se le enviará una nueva contraseña.</p>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="m-t" role="form" method="POST" action="{{ url('/password/email') }}">
                                {!! csrf_field() !!}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Dirección de email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary block full-width m-b">Enviar nueva Contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
