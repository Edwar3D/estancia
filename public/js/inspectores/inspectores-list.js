'use strict';
let $datosTabla = $("#datosTabla");

jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();

$(function () {
    console.log("the document is ready");

    document.getElementById('btn-clean').style.visibility = "hidden";

    get_datosTablaIni();
    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];
        get_datosTabla(page);
        window.history.pushState("", "", url);
    });

});

function get_datosTabla(page) {
    $.ajax({
        url: 'inspectores?act=list&page=' + page,
        type: "GET",
        dateType: 'json',

        data: { sid: Math.random() }

    })
        .done(function (response) {
            if (response.success == true) {
                $datosTabla.html(response.html);
            }
        }).fail(function (jqXHR, textStatus, error) {
            console.log("Post error: " + error);
        });
}

function get_datosTablaIni() {

    $.ajax({
        url: 'inspectores/?act=list',
        type: "GET",
        dateType: 'json',
        data: { sid: Math.random() }
    })
        .done(function (response) {
            if (response.success == true) {
                $datosTabla.html(response.html);
            }
        }).fail(function (jqXHR, textStatus, error) {
            console.log("Post error: " + error);
        });
}


function f_popup_info(url, title) {
    $("#ModalTitleInfo").html(title);
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        data: { sid: Math.random() },
        async: false,
        success: function (datos) {

            $("#ModalBody").html(datos);

            $('#ModalInfo').modal('toggle');

        },
        timeout: 60000,
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>Intente de Nuevo ha excedido el limite de Tiempo</pre>");
        }

    });
}


function f_delete_row(url, title) {
    bootbox.confirm({
        message: "Deseas eliminar el inspector " + title + "?",
        buttons: {
            confirm: {
                label: 'Si',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            console.log('This was logged in the callback: ' + result);
            if (result == true) {
                $.ajax({
                    url: url,
                    type: "delete",
                    dateType: 'json',
                    data: { sid: Math.random() }
                })
                    .done(function (response) {
                        if (response.success == true) {
                            get_datosTablaIni();
                            bootbox.alert(response.message);
                        }else{
                            bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>"+ response.message +"</pre>");
                        }
                    }).fail(function (jqXHR, textStatus, error) {
                        bootbox.alert("<strong>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>"+error+"</pre>");
                    });
            }

        }
    });
}

function search() {
    var cad = document.getElementById('search').value;
    console.log(cad)
    if(cad != '' || cad.length > 2)
    $.ajax({
        url: '/inspectores?act=list&search=' + cad,
        type: "GET",
        dateType: 'json',
    })
        .done(function (response) {
            if (response.success == true) {
                console.log('success');
                $datosTabla.html(response.html);
                document.getElementById('btn-clean').style.visibility = "visible";
            }
            console.log(response.success);
        }).fail(function (jqXHR, textStatus, error) {
            console.log("Get error: " + error);
        });
}
