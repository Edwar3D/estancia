'use strict';
let $datosTabla=$("#datosTabla");

jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }

})();

$(document).ready(function(){

    get_datosTablaIni();
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
       var page=$(this).attr('href').split('page=')[1];
        get_datosTabla(page);
        window.history.pushState("", "", url);
    });

});

function get_datosTabla(page) {
            $.ajax({
                url:'dependencias/?act=list&page='+page,
                type: "GET", //GET,POST,PUT,DELETE
                dateType:'json',
                //data:$formFiltro.serialize()
                data:{sid:Math.random()}

            })
            .done(function(response){
                if(response.success==true){
                    $datosTabla.html(response.html);
                }
            }).fail(function (jqXHR, textStatus, error) {
                console.log("Post error: " + error);
            });
}

function get_datosTablaIni() {
  //loader("block");
            $.ajax({
                url:'dependencias/?act=list',
                type: "GET",//GET,POST,PUT,DELETE
                dateType:'json',
                data:{sid:Math.random()}
            })
            .done(function(response){
                if(response.success==true){
                    $datosTabla.html(response.html);
                }
            }).fail(function (jqXHR, textStatus, error) {
                console.log("Post error: " + error);
            });
}
function f_popup_info(url,title) { //Ver planilla
    $("#ModalTitleInfo").html(title);
    $.ajax({
      type: "GET",
      url:url,
      cache: false,
      data: {sid:Math.random()},
      async:false,
      success: function(datos){
      //alert("Datos Info"+datos);

        $("#ModalBody").html(datos);
        //$('#ModalInfo').modal('show');
        $('#ModalInfo').modal('toggle');
        //alert(lat+"/"+lng)
        },
      timeout:60000,
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>Intente de Nuevo ha excedido el limite de Tiempo</pre>");
      }

    });
}


function f_delete_row(url, dependecia) {
    bootbox.confirm({
        message: "Deseas eliminar la dependecia " + dependecia + "?\nTambién se eliminarás sus subdependecias.",
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
                        }
                    }).fail(function (jqXHR, textStatus, error) {
                        bootbox.alert("error: " + error);
                    });
            }

        }
    });
}

