$(document).ready(function() {

    //btn buscar

    $("#resultado").hide();
    $('#actualizar').hide();
    $('#buscar').click(function(e) {
        e.preventDefault();
        $("#resultado").hide().text(``);

        let buscar = $("#usuarioBuscar").val();
        let opcion = $('#opcion').val();


        if (buscar.length >= 2 && buscar.length <= 15 && opcion === "buscar") {
            $('#resultado').html('');

            $.ajax({
                type: "post",
                url: "js/adm/admBuscarPersona.php",
                data: { opcion, buscar },
                success: function(response) {
                    $("#resultado").append(response);
                    $("#resultado").fadeIn();
                    modificar();
                    eliminar()
                }
            });


        } else {
            toastr["error"]("Nombre de la persona muy corto o muy largo...!!!", "Smart Agronomy")
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            $("#tableBody")
                .fadeIn()
                .hide()
                .append(``)
        }
    });

});

function modificar() {

    $('.modificar').click(function(e) {
        e.preventDefault();
        $('#tablaResultado').fadeOut();

        $("table tbody tr").click(function() {
            let buscar = $(this).find("td:eq(0)").text();
            let opcion = "modificar";

            $.ajax({
                type: "post",
                url: "js/adm/admBuscarPersona.php",
                data: { opcion, buscar },
                success: function(response) {
                    $("#resultado").append(response);
                    $("#resultado").fadeIn();
                    actualizar();
                }
            });
        });
    });
}

function actualizar() {
    $("#actualizar").click(function(e) {
        e.preventDefault();
        let rut = $("#rut").val();
        let nombre = $("#NombresAct").val();
        let apellido = $("#apellidosAct").val();
        let celular = $("#celularAct").val();
        let telefono = $("#telefonoAct").val();
        let fecha = $("#fechaAct").val();
        let correo = $("#correoAct").val();
        let opcion = "actualizaPersona";

        $.ajax({
            type: "post",
            url: "js/adm/admBuscarPersona.php",
            data: { opcion, rut, nombre, apellido, celular, telefono, fecha, correo },
            success: function(response) {
                $('#resultado').fadeOut();

                toastr["success"]("Actualizacion de usuario ha sido exitosa...!!!", "Smart Agronomy")
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }


            }
        });

    });
}

function eliminar() {
    $('.eliminar').click(function(e) {
        e.preventDefault();
        $('#tablaResultado').fadeOut();

        $("table tbody tr").click(function() {
            let buscar = $(this).find("td:eq(0)").text();
            let opcion = "eliminarPersona";
            console.log(buscar)
            $.ajax({
                type: "post",
                url: "js/adm/admBuscarPersona.php",
                data: { opcion, buscar },
                success: function(response) {
                    $('#resultado').fadeOut();

                    toastr["success"]("La eliminacion del usuario ha sido exitosa...!!!", "Smart Agronomy")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            });
        });
    });
}