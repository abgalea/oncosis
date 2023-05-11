@extends('layouts.base')

@section('body')
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    @if ( ! Auth::guest())
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">{{ $currentUser->full_name }}</strong>
                                    </span>
                                    <span class="text-muted text-xs block">{{ $currentUser->position }} <b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInDown m-t-xs">
                                <li><a href="{{ url('logout') }}">Cerrar sesión</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            NMK
                        </div>
                    </li>
                    @endif
                    <li class="{{ ($currentRoute == 'home') ? 'active' : '' }}">
                        <a href="{{ url('home') }}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
                    </li>

                    @role( array('admin', 'enfermero', 'secretaria') )
                    <li class="{{ ($currentRoute == 'reports') ? 'active' : '' }}">
                        <a href="{{ route('reports.economics')}}"><i class="fa fa-bar-chart"></i> <span class="nav-label">Reportes</span> </a>
                    </li>
                    @endrole

                    @role( array('admin', 'enfermero', 'secretaria', 'visitante') )
                    <li class="{{ ($currentRoute == 'patients') ? 'active' : '' }}">
                        <a href="{{ route('patients.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Pacientes</span> </a>
                    </li>
                    @endrole


                    <!--
                        <li class="{{ ($currentRoute == 'payments') ? 'active' : '' }}">
                            <a href="{{ route('payments.index') }}"><i class="fa fa-usd"></i> <span class="nav-label">Pagos</span> </a>
                        </li>
                        <li class="{{ ($currentRoute == 'orders') ? 'active' : '' }}">
                            <a href="{{ route('orders.index') }}"><i class="fa fa-square"></i> <span class="nav-label">Órdenes</span> </a>
                        </li>
                    -->

                    @role( array('admin', 'enfermero', 'secretaria') )
                    <li class="{{ ($currentRoute == 'protocols') ? 'active' : '' }}">
                        <a href="{{ route('protocols.index') }}"><i class="fa fa-medkit"></i> <span class="nav-label">Esquemas</span> </a>
                    </li>
                    @endrole

                    @role( array('admin', 'secretaria') )
                    {{--  <li class="{{ ($currentRoute == 'practices') ? 'active' : '' }}">
                        <a href="{{ route('practices.index') }}"><i class="fa fa-stethoscope"></i> <span class="nav-label">Prácticas</span> </a>
                    </li>  --}}
                    @endrole

                    @role( array('admin', 'secretaria') )
                    <li class="{{ ($currentRoute == 'treatments') ? 'active' : '' }}">
                        <a href="{{ route('treatments.index') }}"><i class="fa fa-stethoscope"></i> <span class="nav-label">Tratamientos</span> </a>
                    </li>
                    @endrole

                    @role( array('admin', 'enfermero', 'secretaria') )
                    <li class="{{ ($currentRoute == 'pathologies') ? 'active' : '' }}">
                        <a href="{{ route('pathologies.index') }}"><i class="fa fa-bug"></i> <span class="nav-label">Patologías</span> </a>
                    </li>
                    @endrole

                    @role( array('admin', 'secretaria') )
                    <li class="{{ ($currentRoute == 'insurance_providers') ? 'active' : '' }}">
                        <a href="{{ route('insurance_providers.index') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">Obras Sociales</span> </a>
                    </li>
                    @endrole

                    @role( array('admin', 'secretaria') )
                    <li class="{{ ($currentRoute == 'providers') ? 'active' : '' }}">
                        <a href="{{ route('providers.index') }}"><i class="fa fa-institution"></i> <span class="nav-label">Instituciones</span> </a>
                    </li>
                    @endrole

                    @role( array('admin', 'secretaria') )
                    <li class="{{ ($currentRoute == 'metrics') ? 'active' : '' }}">
                        <a href="{{ route('metrics.index') }}"><i class="fa fa-line-chart"></i> <span class="nav-label">Métricas</span> </a>
                    </li>
                    @endrole


                    @role( array('admin') )
                    <li class="{{ ($currentRoute == 'itemsdeleted') ? 'active' : '' }}">
                        <a href="{{ route('itemsdeleted') }}"><i class="fa fa-trash"></i> <span class="nav-label">Datos Eliminados</span> </a>
                    </li>
                    <li class="{{ ($currentRoute == 'users') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Usuarios</span> </a>
                    </li>
                    <li class="{{ ($currentRoute == 'roles') ? 'active' : '' }}">
                        <a href="{{ route('roles.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Roles</span> </a>
                    </li>
                    @endrole
                </ul>



            </div>

            <div class="text-center ssl-badge">
                <script language="JavaScript" type="text/javascript">
                    //TrustLogo("https://www.oncosis.net/img/comodo_secure_seal_113x59_transp.png", "CL1", "none");
                </script>
                <a  href="https://ssl.comodo.com" id="comodoTL">SSL Certificates</a>
            </div>

        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <!-- form role="search" class="navbar-form-custom" method="post" action="#">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form -->
                    </div>
                    @if ( ! Auth::guest())
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="{{ url('logout') }}">
                                <i class="fa fa-sign-out"></i> Cerrar sesión
                            </a>
                        </li>
                    </ul>
                    @endif
                </nav>
            </div>

            @yield('content')

            <div class="footer">
                <div>
                    <strong>&copy; 2014-2015</strong> Dra. Nora Mohr de Krause :: {{ get_git_version() }}
                </div>
            </div>

        </div>
    </div>



    @if (isset($item))
    <div class="modal inmodal" id="seguimiento" tabindex="-1" role="dialog" aria-hidden="true">
        {{ Form::open(['route' => ['patients.checkin.store', $item->id], 'method' => 'POST']) }}
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-history modal-icon"></i>
                    <h4 class="modal-title">Seguimiento</h4>
                </div>
                <div class="modal-body">
                    @if (count($metrics) > 0)
                    @foreach($metrics as $metric)
                    <div class="form-group">
                        <label>{{ $metric->name }}</label>
                        <input type="text" name="metric[{{ $metric->id }}]" placeholder="{{ $metric->name }}" class="form-control">
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar Seguimiento</button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
    @endif

    @yield('modals')

    @yield('before-scripts')
    <script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
    <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    @yield('after-scripts')
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('after-script-app')
    @include('partials.notifications')
</body>
@endsection
