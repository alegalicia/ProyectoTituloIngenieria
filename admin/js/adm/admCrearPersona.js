$(document).ready(function() {
    $("#resultado").hide();
    $("#resultado").html(``);
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

        let res = validaciones(nombres, apellidos, rut, correo, clave, fecha, celular, telefono)

        if (res) {

            $.ajax({
                type: "post",
                url: "js/adm/admCrearPersona.php",
                data: { rol, nombres, apellidos, rut, correo, clave, fecha, telefono, celular },
                success: function(response) {
                    $("#resultado").val("");
                    console.log(response)
                    if (response != 1) {
                        $("#resultado").fadeOut();
                        $("#crear")
                            .removeClass("btn-success")
                            .addClass("btn-info")
                            .html("Creando usuario...")
                            .attr("disabled", true);

                        setTimeout(function() {
                            $("#crear").removeClass("btn-info");
                            $("#crear").addClass("btn-success");
                            $("#crear").html("Crear Usuario");
                            $("#crear").attr("disabled", false);
                            $("#resultado").html(`
                        <br>
                        <div class="alert alert-warning alert-dismissible fade show col-3" role="alert">
                        Usuario: <strong> ${rut}</strong>
                            <br>
                            Contraseña: <strong>${clave} </strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="close">
                            </button>
                        </div>
                        `);
                            $("#resultado").fadeIn();
                            $("input:text").val("");
                        }, 3500);

                        toastr["success"]("La creación de la persona y el usuario ha sido exitosa...!!!", "Smart Agronomy")
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


                    } else {
                        $("#crear").removeClass("btn-success");
                        $("#crear").addClass("btn-danger");
                        $("#crear").html("Error al crear usuario");
                        $("#crear").attr("disabled", true);
                        setTimeout(function() {
                            $("#crear").removeClass("btn-danger");
                            $("#crear").addClass("btn-success");
                            $("#crear").html("Crear Usuario");
                            $("#crear").attr("disabled", false);
                        }, 3500);

                        toastr["error"]("La creación de la persona ha fallado el usuarion ya existe...!!!", "Smart Agronomy")
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
                }
            });
        }

    });


    function validaciones(nombres, apellidos, rut, correo, clave, fecha, celular, telefono) {

        let nombresV = false
        let apellidosV = false
        let rutV = false
        let correoV = false
        let claveV = false
        let fechaV = true
        let celularV = false
        let telefonoV = true

        // return true
        //== validad  nombres
        $("#resultado").html(``)
            //==================================================
        if (nombres.length >= 2 && nombres.length <= 15) {
            nombresV = true
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
            nombresV = false
        }
        //==================================================

        //== validad apellidos
        //==================================================
        if (apellidos.length >= 2 && apellidos.length <= 15) {
            apellidosV = true
        } else {
            toastr["error"]("Apellidos de la persona muy corto o muy largo...!!!", "Smart Agronomy")
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
            apellidosV = false
        }
        //==================================================

        //== validad rut
        //==================================================
        if (rut.length >= 2 && rut.length <= 15) {
            rutV = true
        } else {
            toastr["error"]("RUT muy corto o muy largo...!!!", "Smart Agronomy")
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
            rutV = false
        }
        //==================================================

        //== validad rut
        //==================================================
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(correo)) {
            correoV = true
        } else {
            toastr["error"]("Correo electornico no valido...!!!", "Smart Agronomy")
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
            correoV = false
        }
        //==================================================

        //== validad clave
        //==================================================
        if (clave.length >= 8 && clave.length <= 15) {

            claveV = true
        } else {
            toastr["error"]("Contraseña no cumple con lalongitud (mas de 8 caracteres y menos de 16)...!!!", "Smart Agronomy")
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
            claveV = false
        }
        //==================================================

        //== validad numero celular
        //==================================================
        if (celular.length >= 9 && celular.length <= 15) {
            celularV = true
        } else {
            toastr["error"]("El número telfonico debe ser de 9 degigitos...!!!", "Smart Agronomy")
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
            celularV = false
        }
        //==================================================

        if (nombresV == true && apellidosV == true && rutV == true && correoV == true && claveV == true) {
            return true;
        } else {
            return false;
        }
    }
});