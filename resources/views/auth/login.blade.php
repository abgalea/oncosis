@extends('layouts.login')

@section('page-title', 'Iniciar Sesión')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <h3>Dra. Nora Mohr de Krause</h3>
    <div class="form-body">
        <p>Ingrese su email y contraseña para iniciar sesión.</p>
        <form class="form-m-t" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email o Nombre de Usuario" required>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Iniciar Sesión</button>
            <p class="forgot-password">
                <a href="{{ url('/password/reset') }}"><small>Olvidó su contraseña?</small></a>
            </p>
        </form>
    </div>
</div>
@endsection
