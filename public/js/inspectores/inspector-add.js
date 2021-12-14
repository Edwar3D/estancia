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
                    subdependencia_id: {
                        required: "Obligatorio",
                    },
                    dependencia_id: {
                        required: "Obligatorio",
                    },
                    jefe: {
                        required: "Obligatorio"
                    },
                    correo: {
                        required: "Obligatorio"
                    },
                    telefono: {
                        required: "Obligatorio",
                        digits:"Solo dígitos",
                        maxlength: "Ingrese 10 dígitos",
                        minlength: "Ingrese 10 dígitos",
                    },
                },
                rules: {
                    numero_empleado: {
                        required: true,
                        digits: true,
                        minlength: 3,
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
                    dependencia_id: {
                        required: true,
                    },
                    subdependencia_id: {
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
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength:10
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

                        $("#btnSave").prop("disabled", true);
                    }
                },
                url: url_route+'/inspectores',
                type: 'post',
                data: $('#form1').serialize(),
                success: function(response)
                {
                    console.log(response)

                    if(response.success==true)
                    {
                         bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>"+response.message+"</pre>", function(){
                            $("#nav-fudamentos-tab").click()
                            $("#btnCancel").prop("disabled", true);
                            $("#id_inspector").val(response.id);
                        });

                    }else
                    {
                        bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>"+ response.message +"</pre>", function(){
                            $("#btnSave").removeAttr('disabled');
                            $("html").html = response
                        });
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

function selectDependencia() {
    $.ajax({
            url: '/usuarios/create/?act=1',
            type: "GET",
            dateType: 'json',
            data: $('#form1').serialize(),
        })
        .done(function(response) {
            if (response.success == true) {
                $('#subdependencia_id').empty();
                $('#subdependencia_id').select2({
                    data: response.data
                });
            }
        }).fail(function(jqXHR, textStatus, error) {
            console.log("Get error: " + error);
        });
}
