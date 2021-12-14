'use strict';
var FormValidation = function () {

    var handleValidation1 = function () {

        var form = $('#form');
        var error1 = $('.alert-danger', form);
        var success1 = $('.alert-success', form);

        form.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            messages: {
                nombre: {
                    required: "Obligatorio"
                },
                dependencia_id:
                {
                    required:"Obligatorio"
                },
                responsable: {
                    required: "Obligatorio"
                },
                direccion: {
                    required: "Obligatorio"
                },
                correo: {
                    required: "Obligatorio",
                    email:"Correo no válido"
                },
                telefono: {
                    required: "Obligatorio",
                }
            },
            rules: {
                nombre: {
                    required: true
                },
                dependencia_id:{
                    required:true
                },
                responsable: {
                    required: true
                },
                direccion: {
                    required: true
                },
                correo: {
                    required: true,
                    email: true
                },
                telefono: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength:10
                }
            },
            invalidHandler: function (event, validator) {
                success1.hide();
                error1.show();
            },

            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            }


        });
    }

    var handleSubmit1 = function () {
        var formOpciones = {
            beforeSubmit: function () {
                if (!$('#form').valid()) {
                    bootbox.alert("<strong>Cometio un error.</strong><br><br><pre>Verifique la información y vuelva a intentarlo.</pre>");
                    return false;
                }
                else {
                    $("#btnSave").attr('disabled', 'true');
                }
            },
            url:'/dependencias',
            type: 'post',
            data: $('#form').serialize(),
            success: function (response) {
                $("#btnSave").removeAttr('disabled');
                if (response.success == true) {

                    bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>" + response.message + "</pre>", function () {
                        location.href = url_route + "/dependencias";
                    });

                } else {
                    bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>" + response.message + "</pre>");
                }

            },
            timeout: 60000,
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $("#btnSave").removeAttr('disabled');
                bootbox.alert("<strong>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>" + errorThrown + "</pre>");
            }
        };

        $('#form').ajaxForm(formOpciones);


    }


    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
            handleSubmit1();

        }

    };

}();

$(document).ready(function () {
    FormValidation.init();

});
