'use strict';
var FormValidation = function () {

    var handleValidation1 = function() {

            var form1 = $('#form1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span',
                errorClass: 'help-block help-block-error',
                focusInvalid: false,
                ignore: "",
                messages: {
                    numero_empleado: {
                        required: "Obligatorio"

                    },
                    nombre: {
                        required: "Obligatorio"
                    },
                    apellidos: {
                        required: "Obligatorio"
                    },
                    cargo: {
                        required: "Obligatorio"
                    },
                    area_administrativa: {
                        required: "Obligatorio",
                    },
                    jefe: {
                        required: "Obligatorio"
                    },
                    correo: {
                        required: "Obligatorio"
                    },
                    telefono: {
                        required: "Obligatorio"
                    },
                },
                rules: {
                    numero_empleado: {
                        required: true,
                        digits: true,
                        minlength: 8,
                        maxlength:8
                    },
                    nombre: {
                        required: true
                    },
                    apellidos: {
                        required: true
                    },
                    cargo: {
                        required: true
                    },
                    area_administrativa: {
                        required: true,
                    },
                    nombre: {
                        required: true
                    },
                    apellidos: {
                        required: true
                    },
                    jefe: {
                        required: true
                    },
                    telefono: {
                        required: true
                    },

                    correo: {
                        required: true
                    },
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

    var handleSubmit1 = function() {

            var formOpciones = {
                beforeSubmit: function()
                {
                    if(!$('#form1').valid())
                    {
                        bootbox.alert("<strong>Cometio un error.</strong><br><br><pre>Verifique la información y vuelva a intentarlo.</pre>");
                        return false;
                    }
                    else {

                        $("#btnSave").attr('disabled', 'true');
                    }
                },
                url: url_route+'/inspectores',
                type: 'post',
                data: $('#form1').serialize(),
                success: function(response)
                {
                    $("#btnSave").removeAttr('disabled');
                    if(response.success==true)
                    {
                         bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>"+response.message+"</pre>", function(){
                            location.href =url_route+"/inspectores";
                        });

                    }else
                    {
                        bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>"+response.message+"</pre>");
                    }
                },
                timeout:60000,
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#btnSave").removeAttr('disabled');
                    bootbox.alert("<strong>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>"+errorThrown+"</pre>");
                }
            };

            $('#form1').ajaxForm(formOpciones);
    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
            handleSubmit1();

        }

    };

}();

$(document).ready(function(){
    FormValidation.init();
});


