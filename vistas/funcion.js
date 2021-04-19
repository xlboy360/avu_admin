var elementos = document.getElementsByClassName('agregar');

//Array.from(document.getElementsByClassName('agregar')).forEach((botonEditar,index)=>botonEditar.onclick=editar(index))



/*/ejemplo básico
$("#btn1").click(function(){
    Swal.fire('Ejemplo basico de Sweet Alert 2');
});	*/



/*function editar(index){
    return function clic(){
    console.log('Hola',index);
    //codigo
}

}*/
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-outline-success mx-2',
      cancelButton: 'btn btn-outline-danger mx-2'
    },
    buttonsStyling: false
  })


  function agregar(){
    
    swalWithBootstrapButtons.fire({
        title: '<strong>Asignar match</strong>',
        html:
          '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">'+  
          '<center><table>'+  
          '<tr> <td><label>Cantidad de match</label></td></tr> ' +
          '<tr> <td><input type="text" placeholder="Ejem. 5"></td></tr>'+
          '<tr> <td><label>Seleccionar activación</label></td></tr> ' +
          '<tr> <td><select><option hidden>Seleccionar activación</option> <option>Pepsico</option> <option>Cemex</option> <option>Citibanamex</option> </select></td></tr>'+
          ' </table> </center>',
        
          focusConfirm: false,
          showCancelButton: true,
          confirmButtonText: 'Agregar',
          cancelButtonText: 'Cancelar',
          reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire({
            title: '¡Registro guardado!',
            text: "¿Desea agregar otro? ",
            icon: 'success',
            showCancelButton: true, 
            focusConfirm: false,
            reverseButtons: true,
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar',

            
          }).then((result2)=> {
            if(result2.isConfirmed){
           agregar();
            }
          })
        }
      })
   
}

$(".agregar").click(agregar);	

