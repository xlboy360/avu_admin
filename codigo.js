$('#form-login').submit(function (e) {
    e.preventDefault();

    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#password").val());

    console.log(usuario)
    console.log(password)

    if (usuario.length == 0) {
        Swal.fire({
            icon: "warning",
            title: "Usuario vacío, verifique"
        });
        return false;
    } else if (password.length == 0) {
        Swal.fire({
            icon: "warning",
            title: "Contraseña vacía, verifique"
        });
        return false;
    } else {
        //Por medio de AJAX se actualiza el envío de datos y se envía a otro archivo una vez verificadas las credenciales
        $.ajax({
            url: "bd/login.php",
            type: "POST",
            datatype: "json",
            // Se envían los datos al nuevo archivo para poder registrarlos y decidir si es un administrador o un coordinador
            data: {
                usuario: usuario, password: password
            },
            // Obtiene los datos de login y los enviará como JSON
            success:function(data) {
                if(data="null") { // Si los datos no coinciden con la base de datos se envía un error
                    Swal.fire({
                        icon:"error",
                        title: "Usuario o contraseña incorrectos",
                    });
                } else {
                    Swal.fire({
                        icon:"success", //Si los datos coinciden, accesa a la nueva pantalla
                        title:"Conexión exitosa",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Continuar"
                    }).then((result) => {
                        // Dependiendo del resultado obtenido del pop up se redigirá a la página
                        if(result.value) {
                            window.location.href = "vistas/inicio.php"
                        }
                    })
                }
            }
        })

    }

});