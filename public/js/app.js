jQuery(document).ready(function ($) {
    // Destroy buttons
    $('a.btn-destroy').on('click', function(e) {
        e.preventDefault();
        var that = $(this);
        var itemType = $(this).data('item-type');
        swal({
            title: app.user.first_name + ', esta acción es permanente!',
            text: 'Al realizar esta acción, el/la ' + itemType + ' se borrará permanentemente, estás seguro/a que deseas continuar?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancelar',
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Sí, estoy seguro/a!',
            closeOnConfirm: false
            },
            function () {
                var form = '<form id="form-destroy-item-' + that.data('item-id') + '" method="POST" action="' + that.data('action-target') + '">';
                form += '<input type="hidden" name="_method" value="DELETE"/>';
                form += '<input type="hidden" name="_token" value="' + $('meta[name=_token').attr('content') + '">';
                form += '</form>';
                $('body').append(form);
                $('#form-destroy-item-' + that.data('item-id')).submit();
            }
        );
    });

    var values = {
        "language": "es",
        "maximumInputLength": 30,
        "allowClear": true,
        "theme": "bootstrap",
        "placeholder": "Seleccione..",
    }
    for (var key in values) {
        $.fn.select2.defaults.set(key, values[key]);
    }

    $('select.select2').select2();

    $('select.filter-insurance').select2({
        'placeholder': 'Obra Social...'
    });

    $('select.filter-provider').select2({
        'placeholder': 'Institucion...'
    });

    $('select.filter-pathology').select2({
        'placeholder': 'Patologia...'
    });

    $('select.select2').select2();

    if ($('.js-switch').size() > 0) {
        $('.js-switch').each(function(i, elem) {
            var switchery = new Switchery(elem, { color: '#1AB394' });
        });
    }

    if ($('input.date-picker').size() > 0) {
        $('input.date-picker').datepicker({
            language: 'es',
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: false,
            autoclose: true
        });
    }

    if ($('#test-edit').size() > 0) {
        $('#test-edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var testId = button.data('id');
            var that = $(this);
            if (typeof testId != 'undefined') {
                $.each(tests, function(i, el) {
                    if (el.id == testId) {
                        var modal = that
                          modal.find('textarea[name=test_results]').val(el.test_results)
                          modal.find('textarea[name=test_lab]').val(el.test_lab);
                    }
                })
            }
        });
    }
});
