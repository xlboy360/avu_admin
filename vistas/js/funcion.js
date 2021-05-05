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

function agregar() {
  swalWithBootstrapButtons.fire({
    title: '<strong>Asignar match a ID: ' + x + '</strong>',
    html:
      '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">' +
      '<form id=form-agregar name=envia action="agregar.php"  method="post"> <input id=coordinador name=coordinador type="hidden" value="' + x + '"></input><center><table>' +
      '<tr> <td><label>Cantidad de match</label></td></tr> ' +
      '<tr> <td><input type="text" id=cantidad name=cantidad placeholder="Ejem. 5"></td></tr>' +
      '<tr> <td><label>Seleccionar activación</label></td></tr> ' +
      '<tr> <td><select id=empresa name=empresa><option hidden>Seleccionar activación</option> <option value=1>Pepsico</option> <option value=2>Cemex</option> <option value=3>Citibanamex</option> </select></td></tr>' +
      ' </table> </center> </form>',

    focusConfirm: false,
    showCancelButton: true,
    confirmButtonText: 'Agregar',
    cancelButtonText: 'Cancelar',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      document.envia.submit()
    }
  })

}

$(".agregar").click(agregar);


$('#form-agregar').submit(function (e) {
  e.preventDefault();

  var id = $.trim($("#coordinador").val());
  var cant = $.trim($("#cantidad").val());
  var empresa = $.trim($("#empresa").val());

  console.log('Coor: ' + id);
  console.log('CAnt: ' + cant);
  console.log('Empresa: ' + empresa);

  //Por medio de AJAX se actualiza el envío de datos y se envía a otro archivo una vez verificadas las credenciales
  $.ajax({
    url: "agregar.php",
    type: "POST",
    datatype: "json",
    success: function (data) {
      console.log(data);
    }
  }).send({ "data": "id:id&cantidad:cant&empresa:empresa" });;

});

// Agregar administrador.
$('#formulario-agregar-admin').submit(function (e) {
  e.preventDefault();
  var nombre = $.trim($('#nombre').val() || "");
  var usuario = $.trim($('#usuario').val() || "");
  var contrasena = $.trim($('#contrasena').val() || "");
  var contrasena1 = $.trim($('#contrasena1').val() || "");

  if (nombre.length != 0 && usuario.length != 0 && contrasena.length != 0 && contrasena1.length != 0) {
    if (contrasena === contrasena1) {
      $.ajax({
        url: '../bd/agregar_administrador.php',
        type: 'POST',
        datatype: 'json',
        data: {
          nombre: nombre,
          usuario: usuario,
          contrasena: contrasena
        },
        success: function (data) {
          if (data) {
            Swal.fire({
              icon: 'success',
              title: 'Administrador nuevo almacenado',
            }).then((result) => {
              if (result.value) {
                window.location.reload();
              }
            });
          } else {
            Swal.fire({
              icon: 'warning',
              title: 'Algo salió mal, intente de nuevo',
            })
          }
        }
      })
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Las contraseñas no coinciden, verifique'
      })
    }
  } else {
    Swal.fire({
      icon: 'warning',
      title: 'Campos vacíos',
    });
  }
});

// Agregar coordinador.
$('#formulario-agregar-coordinador').submit(function (e) {
  e.preventDefault();
  var nombre = $.trim($('#nombre').val() || "");
  var usuario = $.trim($('#usuario').val() || "");
  var contrasena = $.trim($('#contrasena').val() || "");
  var contrasena1 = $.trim($('#contrasena1').val() || "");

  if (nombre.length != 0 && usuario.length != 0 && contrasena.length != 0 && contrasena1.length != 0) {
    if (contrasena === contrasena1) {
      $.ajax({
        url: '../bd/agregar_coordinador.php',
        type: 'POST',
        datatype: 'json',
        data: {
          nombre: nombre,
          usuario: usuario,
          contrasena: contrasena
        },
        success: function (data) {
          if (data) {
            Swal.fire({
              icon: 'success',
              title: 'Coordinador nuevo almacenado',
            }).then((result) => {
              if (result.value) {
                window.location.reload();
              }
            });
          } else {
            Swal.fire({
              icon: 'warning',
              title: 'Algo salió mal, intente de nuevo',
            })
          }
        }
      })
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Las contraseñas no coinciden, verifique'
      })
    }
  } else {
    Swal.fire({
      icon: 'warning',
      title: 'Campos vacíos',
    });
  }
});