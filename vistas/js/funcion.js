var elementos = document.getElementsByClassName('agregar');
var x = 'Hola';

function identidad(id1) {
  x = id1;
}

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-outline-success mx-2',
    cancelButton: 'btn btn-outline-danger mx-2'
  },
  buttonsStyling: false
})


// Agregar administrador.
$('#formulario-agregar-admin').submit(function (e) {
  e.preventDefault();
  var nombre = $.trim($('#nombre').val() || "");
  var email = $.trim($('#email').val() || "");
  var contrasena1 = $.trim($('#contrasena1').val() || "");
  var contrasena2 = $.trim($('#contrasena2').val() || "");

  if (nombre.length != 0 && email.length != 0 && contrasena1.length != 0 && contrasena2.length != 0) {
    if(contrasena1 == contrasena2) 
    {
      $.ajax
      ({
        url: '../bd/agregar_administrador.php',
        type: 'POST',
        datatype: 'json',
        data: 
        {
          nombre: nombre,
          email: email,
          contrasena1: contrasena1
        },
        success: function (data) 
        {
          if (data == 'true')
          {
            Swal.fire
            ({
              icon: 'success',
              title: 'Administrador nuevo almacenado',
            }).then((result) =>
            {
              if (result.value)
                window.location.reload();              
            });
          } 
          else 
          {
            Swal.fire
            ({
              icon: 'warning',
              title: 'Algo salió mal, intente de nuevo',
            }).then((result) =>
            {
              console.log(data);
            });
          }
        }
      })
    }
    else 
    {
      Swal.fire
      ({
        icon: 'warning',
        title: 'Las contraseñas no coinciden',
      });
    }    
  }
  else
  {
    Swal.fire
    ({
      icon: 'warning',
      title: 'Campos vacíos',
    });
  }
});
