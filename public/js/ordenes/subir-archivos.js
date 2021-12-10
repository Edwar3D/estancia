'use strict';



var FormValidation = function () {



    var handleValidation1 = function() {
        $('.formFile').each( function(){
            var form = $('#'+this.id);
            var error1 = $('.alert-danger', this);
            var success1 = $('.alert-success', this);
            console.log(this.id)

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
        } )
    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
        }

    };

}();

function upload (id) {
    var formOpciones = {
        beforeSubmit: function()
        {
            if(!$('#formFile'+id).valid())
            {
                bootbox.alert("<strong>Cometio un error.</strong><br><br><pre>Verifique la información y vuelva a intentarlo.</pre>");
                return false;
            }
            else {
                $("#btnUpload"+id).attr('disabled', 'true');

                $("#spinner"+id).attr('hidden',false);
            }
        },
        url:  url_route+"/subirAchivo",
        type: 'post',
        data: $('#formFile'+id).serialize(),
        success: function(response)
        {
            console.log(response);
            $("#btnUpload"+id).removeAttr('disabled');
            $("#spinner"+id).attr('hidden',true);
            if(response.success==true)
            {
                 bootbox.alert("<strong>Mensaje del Sistema</strong><br><br><pre>"+response.message+"</pre>", function(){
                    $("#btnUpload"+id).attr('hidden',true);
                    $("#btnDelete"+id).attr('hidden',false);
                    $("#content-add-doc").append(response.HTML);
                });

            }else
            {
                bootbox.alert("<strong>Ocurrio un error.</strong><br><br><pre>"+response.message+"</pre>");
            }
        },
        timeout:60000,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $("#btnUpload"+id).removeAttr('disabled');
            $("#spinner"+id).attr('hidden',true);
            bootbox.alert("<strong>Ocurrio un error de Network. Intentalo de nuevo.</strong><br><br><pre>"+errorThrown+"</pre>");
        }
    };

    $('#formFile'+id).ajaxForm(formOpciones);
}

$(document).ready(function(){
    FormValidation.init();
    console.log("id",$('#id_orden').val())
     $.ajax({
                url:'/ordenes/create',
                type: "GET",
                dateType:'json',
                data:{
                    "request": {
                        "id_orden": $('#id_orden').val(),
                    }
                }
            })
            .done(function(response){
                if(response.success==true){
                    $("#content-add-doc").html(response.HTML);
                }
            }).fail(function (jqXHR, textStatus, error) {
                console.log("Post error: " + error);
            });
});
