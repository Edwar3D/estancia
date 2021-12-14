'use strict';
let $datosTabla = $("#datosTabla");

$(function () {
    console.log("ready");
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
        url: 'ordenes?act=list&page=' + page,
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
        url: 'ordenes/?act=list',
        type: "GET",
        dateType: 'json',
        data: {  }
    })
        .done(function (response) {
            if (response.success == true) {
                $datosTabla.html(response.html);
            }
        }).fail(function (jqXHR, textStatus, error) {
            console.log("Post error: " + error);
        });
}

