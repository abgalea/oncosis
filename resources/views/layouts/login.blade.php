@extends('layouts.base')

@section('body')
    <body class="gray-bg">
        @yield('content')
        <div class="text-center">
            @if(App::environment() == 'production' ))
            <script language="JavaScript" type="text/javascript">
                TrustLogo("https://www.oncosis.net/img/comodo_secure_seal_113x59_transp.png", "CL1", "none");
            </script>
            @endif
            {{-- <a href="https://ssl.comodo.com" id="comodoTL" target="_blank">SSL Certificates</a> --}}
            <small class="muted">{{ get_git_version() }}</small>
        </div>
    </body>
@endsection
