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
        
    }

});