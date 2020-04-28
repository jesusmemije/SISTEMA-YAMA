$(document).ready(function() {

    $("#login-button").on("click", function(event) {
        event.preventDefault();
        $("#login-button").prop("disabled", true);

        var email = $("#email").val();
        var password = $("#password").val();

        if ( email == "" ) {

            Swal.fire({
                icon: 'warning',
                title: 'Email requerido',
                text: 'No ha ingresado su correo electrónico'
            })
            $("#login-button").prop("disabled", false);

        } else if ( password == ""){

            Swal.fire({
                icon: 'warning',
                title: 'Contraseña requerida',
                text: 'No ha ingresado su contraseña'
            })
            $("#login-button").prop("disabled", false);

        } else {

            var form = $("#form-login").serialize();
            $.ajax({
                type: 'POST',
                url: 'conexiones/validar-credenciales.php',
                data: form,
                success: function(response){

                    $("#login-button").prop("disabled", false);
                    var data = JSON.parse(response);

                    if(data['status'] == '201'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Credenciales correctas',
                            text: 'Redirigiendo al sistema...',
                            footer: '<strong>Iniciando..</strong>',
                            showConfirmButton: false,
                            timer: 3000,
                        }).then((result) => {
                          
                          window.location.href = 'index.php';
               
                        })

                    }else if(data['status'] == '404' || data['status'] == '400'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Acceso denegado',
                            text: data['response']
                        })
                    }
                }
            });
        }
    });
});