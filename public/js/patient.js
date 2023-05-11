Vue.directive('select', {
    twoWay: true,
    priority: 1000,

    params: ['options'],

    bind: function() {
        var self = this
        $(this.el)
        .select2({
            "language": "es",
            "maximumInputLength": 30,
            "allowClear": true,
            "theme": "bootstrap",
            "placeholder": "Seleccione..",
            data: this.params.options
        })
        .on('change', function() {
            self.set($(self.el).val())
        })
    },
    update: function(value) {
        $(this.el).val(value).trigger('change')
    },
    unbind: function() {
        $(this.el).off().select2('destroy')
    }
})

var patientApp = new Vue({
    el: '#patient-resource',

    data: {
        tipo: 'consulta',
        imagenes: [],
        consulta: {
            fecha: null,
            tipo: 'SEGUIMIENTO',
            peso: null,
            altura: null,
            superficie_corporal: null,
            presion_arterial: null,
            institucion: null,
            resumen: null,
            cobrable: true,
            obra_social: null
        },
        estudios: {
            fecha: null,
            recaida: false,
            rc: false,
            rp: false,
            ee: false,
            progresion: false,
            detalle: null,
            laboratorio: null,
            rowImages:[
                {},
            ],
        },
        fisico: {
            fecha: null,
            completo: false,
            recaida: false,
            peso: null,
            altura: null,
            temperatura: null,
            presion_arterial: null,
            completo: null,
            performance: null,
            ta: null,
            cabeza: null,
            cuello: null,
            torax: null,
            abdomen: null,
            urogenital: null,
            tacto_rectal: null,
            tacto_vaginal: null,
            mama: null,
            neurologico: null,
            locomotor: null,
            linfogangliar: null,
            tcs: null,
            piel: null,
        },
        localizacion_tumoral: {
            fecha: null,
            patologia: null,
            tipo: 'Primario',
            numero: null,
            histologia: '',
            biopsia: false,
            pag: false,
            paf: false,
            estadio: null,
            t: null,
            n: null,
            m: null,
            inmunohistoquimica: null,
            receptores_hormonales: null,
            estrogeno: null,
            biologia_molecular: null,
            progesterona: null,
            indice_proliferacion: null,
            ubicacion: null,
            detalles: null,
            rowImages:[
                {},
            ],
        },
        tratamiento: {
            fecha_inicio: null,
            fecha_fin: null,
            recaida: false,
            pathology_location_id: null,
            tratamiento: null,
            institucion: null,
            rc: false,
            rp: false,
            sin_obra_social: false,
            tipo: null,
            ciclos: null,
            dosis_diaria: null,
            dosis_total: null,
            boost: null,
            braquiterapia: null,
            dosis: null,
            protocol_id: null,
            frecuencia: null,
            observaciones: null,
            cobrable: true,
            insurance_provider_id: null
        }
    },

    events: {},

    ready: function() {},

    watch: {

    },

    computed: {
        protocolInstructions: function() {
            if (this.tratamiento.protocol_id) {
                if (typeof window.protocols[this.tratamiento.protocol_id] != 'undefined') {
                    return window.protocols[this.tratamiento.protocol_id].instructions;
                }
                else {
                    return '';
                }
            }
            else {
                return '';
            }
        }
    },

    methods: {
        addRowImage: function(tipo){
            if( tipo == 'estudios')
                this.estudios.rowImages.push({});

            if( tipo == 'localizacion_tumoral')
                this.localizacion_tumoral.rowImages.push({});
        },
        onFileChanged: function(e){
            var files = e.target.files || e.dataTransfer.files;

            if (!files.length)
                return;
            this.imagenes.push(files[0]);
        },
        openQuickAdd: function() {
            jQuery('#patient-details').addClass('hide');
            jQuery('#patient-quick-add').removeClass('hide');
            if( jQuery('#patient-quick-add .redactor').size() > 0 && jQuery('#patient-quick-add .redactor-box').size() < 1 ){
                jQuery('#patient-quick-add .redactor').redactor({
                    minHeight: 300,
                    buttons: ['formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'outdent', 'indent', 'image', 'file', 'link', 'alignment', 'horizontalrule', 'html'],
                    plugins: ['instructions'],
                    lang: 'es_ar',
                    convertLinks: true
                });
            }
        },
        cerrarQuickAdd: function() {
            jQuery('#patient-quick-add').addClass('hide');
            jQuery('#patient-details').removeClass('hide');
        },
        procesarQuickAdd: function() {
            var targetUrl = '';
            var formData = new FormData;

            if (this.tipo == 'consultas') {
                targetUrl = window.baseURL + '/patients/' + window.patientID + '/consultation';
                formData = this.consulta;
                formData['_token'] = jQuery('meta[name=_token]').attr('content');
                formData['resumen'] = jQuery('textarea[name=consulta_resumen]').val();
                console.log( formData );
                jQuery.ajax({
                    beforeSend: function() {
                        jQuery('#quickAddButton').attr('disabled', true);
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        if (response.status == 'success') {
                            window.location = response.url;
                        }
                        else {
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: targetUrl
                });
            }

            if (this.tipo == 'estudios') {
                targetUrl = window.baseURL + '/patients/' + window.patientID + '/studies';
                formData = this.estudios;

                var files = this.imagenes;

                var data = new FormData();
                for (var i = 0; i< files.length; i++) {
                    console.log( files[i]);
                    data.append('files[]', files[i])
                }

                formData['detalle'] = jQuery('textarea[name=estudio_detalle]').val();
                formData['laboratorio'] = jQuery('textarea[name=estudio_laboratorio]').val();

                data.append('_token', jQuery('meta[name=_token]').attr('content'));

                data.append('estudios', JSON.stringify(formData));

                jQuery.ajax({
                    beforeSend: function() {
                        jQuery('#quickAddButton').attr('disabled', true);
                    },
                    data: data,
                    contentType: false,
                    processData: false,
                    // dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        if (response.status == 'success') {
                            window.location = response.url;
                        }
                        else {
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: targetUrl
                });
            }

            if (this.tipo == 'fisico') {
                targetUrl = window.baseURL + '/patients/' + window.patientID + '/physical';
                formData = this.fisico;
                formData['_token'] = jQuery('meta[name=_token]').attr('content');
                jQuery.ajax({
                    beforeSend: function() {
                        jQuery('#quickAddButton').attr('disabled', true);
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        if (response.status == 'success') {
                            window.location = response.url;
                        }
                        else {
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: targetUrl
                });
            }

            if (this.tipo == 'localizacion_tumoral') {
                targetUrl = window.baseURL + '/patients/' + window.patientID + '/location';
                formData = this.localizacion_tumoral;

                formData['histologia'] = jQuery('textarea[name=lt_histologia]').val();
                formData['inmunohistoquimica'] = jQuery('textarea[name=lt_inmunohistoquimica]').val();
                formData['biologia_molecular'] = jQuery('textarea[name=lt_biologia_molecular]').val();
                formData['receptores_hormonales'] = jQuery('textarea[name=lt_receptores_hormonales]').val();
                formData['detalles'] = jQuery('textarea[name=lt_detalles]').val();

                var files = this.imagenes;

                var data = new FormData();
                for (var i = 0; i< files.length; i++) {
                    console.log( files[i]);
                    data.append('files[]', files[i])
                }

                data.append('_token', jQuery('meta[name=_token]').attr('content'));

                data.append('localizacion', JSON.stringify(formData));

                jQuery.ajax({
                    beforeSend: function() {
                        jQuery('#quickAddButton').attr('disabled', true);
                    },
                    data: data,
                    contentType: false,
                    processData: false,
                    error: function(j, t, e) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        if (response.status == 'success') {
                            window.location = response.url;
                        }
                        else {
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: targetUrl
                });
            }

            if (this.tipo == 'tratamiento') {
                targetUrl = window.baseURL + '/patients/' + window.patientID + '/treatment';
                formData = this.tratamiento;

                formData['observaciones'] = jQuery('textarea[name=t_observaciones]').val();

                jQuery("input[name*='instructions']").each(function(i, el) {
                    formData['instructions[' + i + ']'] = $(el).val();
                });
                formData['_token'] = jQuery('meta[name=_token]').attr('content');
                jQuery.ajax({
                    beforeSend: function() {
                        jQuery('#quickAddButton').attr('disabled', true);
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        jQuery('#quickAddButton').attr('disabled', false);
                        if (response.status == 'success') {
                            window.location = response.url;
                        }
                        else {
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: targetUrl
                });
            }
        },
        borrarConsulta: function(itemID) {
            if (confirm('Esta acción es permanente, continuar?')) {
                formData = {
                    '_token': jQuery('meta[name=_token]').attr('content'),
                    '_method': 'delete',
                    'item_id': itemID,
                    'patient_id': window.patientID
                };

                jQuery.ajax({
                    beforeSend: function() {
                        // Nothing
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#consultation-' + itemID).fadeTo('fast', 0);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response.status == 'success') {
                            jQuery('#consultation-' + itemID).detach();
                            window.location = response.url;
                        }
                        else {
                            jQuery('#consultation-' + itemID).fadeTo('fast', 1);
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: window.baseURL + '/patients/' + window.patientID + '/consultation'
                });
            }
        },
        borrarFisico: function(itemID) {
            if (confirm('Esta acción es permanente, continuar?')) {
                formData = {
                    '_token': jQuery('meta[name=_token]').attr('content'),
                    '_method': 'delete',
                    'item_id': itemID,
                    'patient_id': window.patientID
                };

                jQuery.ajax({
                    beforeSend: function() {
                        // Nothing
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#physical-' + itemID).fadeTo('fast', 0);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response.status == 'success') {
                            jQuery('#physical-' + itemID).detach();
                            window.location = response.url;
                        }
                        else {
                            jQuery('#physical-' + itemID).fadeTo('fast', 1);
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: window.baseURL + '/patients/' + window.patientID + '/physical'
                });
            }
        },
        borrarEstudio: function(itemID) {
            if (confirm('Esta acción es permanente, continuar?')) {
                formData = {
                    '_token': jQuery('meta[name=_token]').attr('content'),
                    '_method': 'delete',
                    'item_id': itemID,
                    'patient_id': window.patientID
                };

                jQuery.ajax({
                    beforeSend: function() {
                        // Nothing
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#study-' + itemID).fadeTo('fast', 0);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response.status == 'success') {
                            jQuery('#study-' + itemID).detach();
                            window.location = response.url;
                        }
                        else {
                            jQuery('#study-' + itemID).fadeTo('fast', 1);
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: window.baseURL + '/patients/' + window.patientID + '/studies'
                });
            }
        },
        borrarLocalizacion: function(itemID) {
            if (confirm('Esta acción es permanente, continuar?')) {
                formData = {
                    '_token': jQuery('meta[name=_token]').attr('content'),
                    '_method': 'delete',
                    'item_id': itemID,
                    'patient_id': window.patientID
                };

                jQuery.ajax({
                    beforeSend: function() {
                        // Nothing
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#location-' + itemID).fadeTo('fast', 0);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response.status == 'success') {
                            jQuery('#location-' + itemID).detach();
                            window.location = response.url;
                        }
                        else {
                            jQuery('#location-' + itemID).fadeTo('fast', 1);
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: window.baseURL + '/patients/' + window.patientID + '/location'
                });
            }
        },
        borrarTratamiento: function(itemID) {
            if (confirm('Esta acción es permanente, continuar?')) {
                formData = {
                    '_token': jQuery('meta[name=_token]').attr('content'),
                    '_method': 'delete',
                    'item_id': itemID,
                    'patient_id': window.patientID
                };

                jQuery.ajax({
                    beforeSend: function() {
                        // Nothing
                    },
                    data: formData,
                    dataType: 'json',
                    error: function(j, t, e) {
                        jQuery('#treatment-' + itemID).fadeTo('fast', 0);
                        swal({
                            title: "Error!",
                            text: t,
                            type: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response.status == 'success') {
                            jQuery('#treatment-' + itemID).detach();
                            window.location = response.url;
                        }
                        else {
                            jQuery('#treatment-' + itemID).fadeTo('fast', 1);
                            swal({
                                title: "Error!",
                                text: response.message,
                                html: true,
                                type: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    url: window.baseURL + '/patients/' + window.patientID + '/treatment'
                });
            }
        }
    }
});
