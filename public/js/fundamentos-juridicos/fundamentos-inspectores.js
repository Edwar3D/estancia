'use strict';

var fundamentosSeleccionados = [];

var handleValidation2 = function () {

    var handleValidation = function () {

        var form1 = $('#formFundamentos');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            messages: {
                fundamento: {
                    required: "Obligatorio"
                },
                url: {
                    required: "Obligatorio",
                    url: "Asegurese de ser una URL"
                },
            },
            rules: {
                fundamento: {
                    required: true
                },
                url: {
                    required: true,
                    url: true
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

    var handleSubmit = function () {

        var formOpciones = {
            beforeSubmit: function () {
                if (!$('#formFundamentos').valid()) {
                    bootbox.alert("<strong>Cometio un error.</strong><br><br><pre>Verifique la información y vuelva a intentarlo.</pre>");
                    return false;
                }
                else {
                    $("#btnNewFundamento").attr('disabled', 'true');
                }
            },
            url: url_route + '/fundamentosInspectores',
            type: 'post',
            data: $('#formFundamentos').serialize(),
            success: function (response) {
                if (response.success == true) {
                    bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>" + response.message + "</pre>", function () {
                        $("#formFundamentos")[0].reset();
                        $("#btnNewFundamento").removeAttr('disabled');
                        fundamentos();
                        $("#añadirFundamento .close").click()
                    });

                } else {
                    bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>" + response.message + "</pre>");
                }
            },
            timeout: 60000,
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $("#btnNewFundamento").removeAttr('disabled');
                bootbox.alert("<strong>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>" + errorThrown + "</pre>");
            }
        };

        $('#formFundamentos').ajaxForm(formOpciones);
    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation();
            handleSubmit();
        }

    };

}();

//obtener todos los fundamentos registrados
function fundamentos() {
    $.ajax({
        url: '/fundamentosInspectores/',
        type: "GET",
        dateType: 'json',
        data: { sid: Math.random() }
    })
        .done(function (response) {
            if (response.success == true) {
                response.data.forEach(fundamento => {
                    var $el = '<div class="drag drop-item " id="' + fundamento.id + '">' +
                        '<div><span>' + fundamento.fundamento + '</span>' +
                        '<p><a href="' + fundamento.url + '" class="text-secondary font-italic" target="_blank">' +
                        fundamento.url + '</a></p>' +
                        '</div> </div>';
                    $('#modules').append($el);
                });
                iniciarDraggable();
            }
        }).fail(function (jqXHR, textStatus, error) {
            console.log("Post error: " + error);
        });
}

function iniciarDraggable() {

    $('.drag').draggable({
        appendTo: 'body',
        helper: 'clone'
    });

    $('#dropzone').droppable({
        activeClass: 'active-zone',
        hoverClass: 'hover',
        accept: ":not(.ui-sortable-helper)",
        drop: function (e, ui) {
            var element = $('#' + ui.draggable.attr('id'));
            fundamentosSeleccionados.push(ui.draggable.attr('id'));

            var $el = $('<div class="drop-item">' + element.find('span').text() +
                '<div><p><a href="' + element.find('a').text() + '" class="text-secondary font-italic" target="_blank">' +
                element.find('a').text() + '</a></p></div></div>'
            );

            $el.append($(
                '<button type="button" class="btn btn-danger btn-xs remove my-auto"><i class="fas fa-times"></i></button>'
            ).click(function () {
                $(this).parent().detach();//quitar elemento del dropzone
                element.show("linear"); //volver a visualizar el elemento en modules
                var indice = fundamentosSeleccionados.indexOf(element.attr('id')); //buscar el indice del id
                fundamentosSeleccionados.splice(indice, 1) //eliminar del arreglo
            }));

            $(this).append($el);
            element.hide("linear");
        }
    }).sortable({
        items: '.drop-item',
        sort: function () {
            $(this).removeClass("active-zone");
        }
    });
}

function cancelFundamentos() {
    bootbox.alert("<strong>Cancelar Registro</strong><br><br><pre>El inspector se quedará sin fundamentos Juridcos</pre>");
}

function SaveFundamentos() {
    if ($('#id_inspector').val() == '') {
        bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>Hubo un probelma al relacionar los fundamentos con el inspector </pre>");
    } else if (fundamentosSeleccionados.length == 0) {
        bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>Seleccione al menos un fundamento para guardar</pre>");
    } else {
        $.ajax({
            url: '/fundamentosInspectores/addFundamentosInspector',
            type: "POST",
            dateType: 'json',
            data: {
                "request": {
                    "inspector": $('#id_inspector').val(),
                    "fundamentos": fundamentosSeleccionados,
                }
            },
        })
            .done(function (response) {
                //console.log(response)
                if (response.success == true) {
                    bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>" + response.message + "</pre>", function () {
                        location.href = url_route + "/inspectores";
                    });
                } else {
                    bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>" + response.message + "</pre>");
                }
            }).fail(function (jqXHR, textStatus, error) {
                bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>" + error + "</pre>");
            });
    }
}

$(document).ready(function () {
    handleValidation2.init();
    fundamentos();
});


