@extends('layouts.login')

@section('page-title', 'Reestablecer Contraseña')

@section('content')
@section('content')
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">Reestablecer Contraseña</h2>
                    <p>Ingrese una nueva contraseña para reestablecerla</p>

                    <div class="row">
                        <div class="col-lg-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    
                            <form class="m-t" role="form" method="POST" action="{{ url('/password/reset') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label">E-Mail</label>

                                
                                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label">Contraseña</label>

                                
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="control-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary block full-width m-b">
                                    <i class="fa fa-btn fa-refresh"></i> Reestablecer Contraseña
                                </button>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
