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
            url:"bd/login.php",
            type:"POST",
            datatype: "json",
            data: {usuario:usuario, password:password}, 
            success:function(data){               
                if(data == "null"){
                    Swal.fire({
                        icon:'error',
                        title:'Usuario y/o password incorrecta',
                    });
                }else{
                    Swal.fire({
                        icon:'success',
                        title:'¡Conexión exitosa!',
                        confirmButtonColor:'#3085d6',
                        confirmButtonText:'Ingresado correctamente'
                    }).then((result) => {
                        if(result.value){
                            window.location.href = "vistas/index.php";
                        }
                    });
                }
            }    
         });
    }

});