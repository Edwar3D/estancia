'use strict';
var FormValidation = function () {

    var handleValidation1 = function() {

            var form1 = $('#formOrden');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    folio: {
                        required: "Obligatorio"
                    },
                    fecha: {
                        required: "Obligatorio"
                    },
                    dependencia_id: {
                        required: "Obligatorio"
                    },
                    tipo:{
                        required: "Obligatorio"
                    },
                    direccion: {
                        required: "Obligatorio"
                    },
                    zona: {
                        required: "Obligatorio",
                    },
                    inspector_id: {
                        required: "Obligatorio"
                    },
                },
                rules: {
                    folio: {
                        required: true
                    },
                    fecha: {
                        required: true
                    },
                    dependencia_id: {
                        required: true
                    },
                    tipo:{
                        required: true,
                    },
                    direccion: {
                        required: true,
                    },
                    zona: {
                        required: true
                    },
                    inspector_id: {
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
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
                    if(!$('#formOrden').valid())
                    {
                        bootbox.alert("<strong>Cometio un error.</strong><br><br><pre>Verifique la información y vuelva a intentarlo.</pre>");
                        return false;
                    }
                    else {

                        $("#btnSave").attr('disabled', 'true');
                    }
                },
                url: url_route+'/ordenes',
                type: 'post',
                data: $('#formOrden').serialize(),
                success: function(response)
                {
                    console.log(response);
                    $("#btnSave").removeAttr('disabled');
                    if(response.success==true)
                    {
                         bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>"+response.message+"</pre>", function(){
                           /*  location.href =url_route+"/ordenes"; */
                        });
                        $("#id_orden").val(response.idOrden);

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

            $('#formOrden').ajaxForm(formOpciones);


    }


    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
            handleSubmit1();

        }

    };

}();


$('#inspector_id').on('change', function(){
    console.log($(this).val())
    $.ajax({
            url: '/inspectores/'+$(this).val(),
            type: "GET",
            dateType: 'json',
            data:{ "request": {
                'opc':'preview'
            }},
        })
        .done(function(response) {
            if (response.success == true) {
                $('#preview-inespctor').html(response.html);
            }
        }).fail(function(jqXHR, textStatus, error) {
            $('#preview-inespctor').html('<h6>Hubo un error al cargar la información</h6>');
        });
});

$(function() {
    $('#fecha').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 2021,
      maxYear: 2030,
      locale: {
        format:  "DD/MM/YYYY",

      }
    }, function(start, end, label) {
     /*  var years = moment().diff(start, 'years');
      alert("You are " + years + " years old!"); */
    });
});


$(document).ready(function(){
    //cargar previsualizaciond del primer inspector
   $.ajax({
            url: '/inspectores/'+$('#inspector_id').val(),
            type: "GET",
            dateType: 'json',
            data:{ "request": {
                'opc':'preview'
            }},
        })
        .done(function(response) {
            if (response.success == true) {
                $('#preview-inespctor').html(response.html);
            }
        }).fail(function(jqXHR, textStatus, error) {
            $('#preview-inespctor').html('<h6>Hubo un error al cargar la información</h6>');
        });
    FormValidation.init();

});

