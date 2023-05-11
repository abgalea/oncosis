@if ($errors->any())
    <?php
        $message = 'Tenemos algunos problemas...';
        $messages = $errors->all();
        $message.= '<li>' . implode('</li><li>', $messages) . '</li>';
    ?>
    <script>
        jQuery(document).ready(function($) {
            // $('body').pgNotification({
            //     style: 'bar',
            //     message: '{!! $message !!}',
            //     position: 'top',
            //     timeout: 0,
            //     type: 'error'
            // }).show();
        });
    </script>
@endif

@if (Session::has('messages'))
    <?php $msg = Session::get('messages'); ?>
    <script>
        jQuery(document).ready(function($) {
            toastr.options = {
                closeButton: true,
                debug: false,
                progressBar: true,
                preventDuplicates: true,
                positionClass: 'toast-top-right',
                onclick: null,
                showDuration: 400,
                hideDuration: 1000,
                timeOut: 7000,
                extendedTimeOut: 1000,
                showEasing: 'swing',
                hideEasing: 'linear',
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
            };
            var $toast = toastr['{{ $msg['type'] }}']('{{ $msg['text'] }}', null);
        });
    </script>
@endif
