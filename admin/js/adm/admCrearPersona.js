$(document).ready(function() {
    $('#crear').click(function(e) {
        e.preventDefault();
        let rol = $('#rol option:selected').val();
        let nombres = $('#nombres').val();
        let apellidos = $('#apellidos').val();
        let rut = $('#rut').val();
        let correo = $('#correo').val();
        let clave = $('#clave').val();
        let fecha = $('#fecha').val();
        let celular = $('#celular').val();
        let telefono = $('#telefono').val();

        $.ajax({
            type: "post",
            url: "js/adm/admCrearPersona.php",
            data: { rol, nombres, apellidos, rut, correo, clave, fecha, telefono, celular },
            success: function(response) {

                if (response == 1) {
                    $("#crear").removeClass("btn-success");
                    $("#crear").addClass("btn-info");
                    $("#crear").html("Usuario Creado");
                    $("#crear").attr("disabled", true);

                    setInterval(function() {
                        $("#crear").removeClass("btn-info");
                        $("#crear").addClass("btn-success");
                        $("#crear").html("Crear Usuario");
                        $("#crear").attr("disabled", false);
                        $("input:text").val("");
                    }, 2500);


                    toastr["success"]("La creación de la persona y el usuario ha sido exitosa...!!!", "Smart Agronomy")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": tur,
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

                } else {

                    $("#crear").removeClass("btn-success");
                    $("#crear").addClass("btn-danger");
                    $("#crear").html("Error al crear usuario");
                    $("#crear").attr("disabled", true);

                    setInterval(function() {
                        $("#crear").removeClass("btn-danger");
                        $("#crear").addClass("btn-success");
                        $("#crear").html("Crear Usuario");
                        $("#crear").attr("disabled", false);
                        $("input:text").val("");
                    }, 2500);

                    toastr["error"]("La creación de la persona ha fallado el usuarion ya existe...!!!", "Smart Agronomy")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": tur,
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


            }
        });
    });
});