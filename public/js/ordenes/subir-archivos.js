'use strict';

var FormValidation = function () {

    var handleValidation1 = function () {
        $('.formFile').each(function () {
            //se valida cada input de la vista
            var form = $(`#${this.id}`);
            var error1 = $('.alert-danger', this);
            var success1 = $('.alert-success', this);

            form.validate({
                errorElement: 'span',
                errorClass: 'help-block help-block-error',
                focusInvalid: false,
                ignore: "",
                messages: {
                    file: {
                        required: "Obligatorio"
                    }
                },
                rules: {
                    file: {
                        required: true
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
        })
    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
        }
    };

}();

function upload(id) {
    var formOpciones = {
        beforeSubmit: function () {
            if (!$(`#formFile${id}`).valid()) {
                bootbox.alert("<strong>Cometio un error.</strong><br><br><pre>Verifique la información y vuelva a intentarlo.</pre>");
                return false;
            }
            else {
                $(`#btnUpload${id}`).attr('disabled', 'true');

                $(`#spinner${id}`).attr('hidden', false);
            }
        },
        url: url_route + "/subirAchivo",
        type: 'post',
        data: $(`#formFile${id}`).serialize(),
        success: function (response) {
            console.log(response);
            $(`#btnUpload${id}`).removeAttr('disabled');
            $(`#spinner${id}`).attr('hidden', true);
            if (response.success == true) {
                bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>" + response.message + "</pre>", function () {
                    $(`#inputFile${id}`).attr('hidden', true);
                    $(`#file${id}`).attr('hidden', false);
                    $(`#view${id}`).attr("href", `/subirAchivo/${response.data}`);
                    $(`#delete${id}`).attr('onClick', `deleteFile(${response.data},${id})`);
                });

            } else {
                bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>" + response.message + "</pre>");
            }
        },
        timeout: 60000,
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            $(`#btnUpload${id}`).removeAttr('disabled');
            $(`#spinner${id}`).attr('hidden', true);
            bootbox.alert("<strong>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>" + errorThrown + "</pre>");
        }
    };

    $(`#formFile${id}`).ajaxForm(formOpciones);
}


function deleteFile(id, tipo_id) {
    $.ajax({
        url: url_route + "/subirAchivo/" + id,
        type: "delete",
        dateType: 'json',
        data: {}
    })
        .done(function (response) {
            if (response.success == true) {
                console.log(response);
                bootbox.alert("<strong>Archivo eliminado</strong><br><br><pre>" + response.message + "</pre>", function () {
                    $(`#inputFile${tipo_id}`).trigger("reset");
                    $(`#inputFile${tipo_id}`).attr('hidden', false);
                    $(`#file${tipo_id}`).attr('hidden', true);
                });
            }else{
                bootbox.alert("<strong>Ocurrio un erro</strong><br><br><pre>" + response.message + "</pre>");
            }
        }).fail(function (jqXHR, textStatus, error) {
            bootbox.alert("<strong>>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>" +  errorThrown + "</pre>");
        });
}

$(document).ready(function () {
    FormValidation.init();

});
