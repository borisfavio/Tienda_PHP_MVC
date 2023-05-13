$(document).on('ready', function(){
   // AJAX de Formularios (Agregar)
   $('form.form-datos').validator().on('submit', function(e){
      $('button[type="submit"]').attr('disabled', 'disabled');
      var $this = $(this);
      if (e.isDefaultPrevented()) {
         swal("¡Cancelado!", "Datos Incompletos.", "warning");
      }else{
         e.preventDefault();
         $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serializeArray(),
            success: function(data) {
               if(data.toString() == 'ok'){
                  $this.clearForm();
                  swal("¡Registrado!", "Los datos fueron guardados exitosamente.", "success");
               }else{
               	swal("¡Cancelado!", "Error al guardar los datos.", "error");
               }
               $('button[type="submit"]').prop('disabled', false);
               $('button[type="submit"]').removeAttr('disabled');
            },
            error: function(jqXHR, status, error) {
               swal("¡Cancelado!", "No se pudo establecer una conexión con el Servidor.", "error");
            }
         });
         $('button[type="submit"]').removeAttr('disabled');
         return 0;
      }
      $('button[type="submit"]').removeAttr('disabled');
   }); // Fin de AJAX (Agregar)

   // Acción de Eliminar
   $('table.tabla-datos tbody').on('click', 'button.eliminar-item', function(){
      var fila = $(this).parent().parent();
      console.log(fila.index());
      var url = $('table.tabla-datos').data('url');
      var name = $(this).data('name');
      var datos = {"id" : $(this).data('id'), "operacion" : "borrar"};
      swal({
	   	title: "Estas Seguro ?",
			text: "Borrar el registro de <strong>" + name + "</strong>",
			html: true,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Borrar",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false
      }, function(isConfirm){
         if(isConfirm) {
            $.ajax({
               url: url,
               type: 'post',
               data: datos, 
               success: function (data) {
                  console.log(data);
                  if (data.resp == 'ok') {
                     fila.remove();
                     swal("¡Borrado!", "Tu memoria ha sido borrada.", "success");
                  }else{
                     swal("Cancelado", "No hemos podido eliminar los datos, por favor intenta nuevamente.", "error");
                  }
               }
            });
         }
      })
   }); // Fin de Eliminar
});




// btn5.onclick = function() { 
//   swal({
//   title: "¿Estás seguro?",
//   text: "¡No hay marcha atras!",
//   type: "warning",
//   showCancelButton: true,
//   confirmButtonColor: "#DD6B55",
//   confirmButtonText: "¡Si, borrar mi memoria ahora!",
//   closeOnConfirm: false
// },
// function(){
//   swal("¡Borrado!", "Tu memoria ha sido borrada.", "success");
// });



$.fn.clearForm = function() {
    return this.each(function() {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input',this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number' || type == 'email' || type == 'tel')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};

         // swal({
         //    title: 'INFO',
         //    text: "Se ha autenticado correctamente",
         //    type: 'success',
         //    showCancelButton: false,
         //    confirmButtonColor: '#3085d6',
         //    cancelButtonColor: '#d33',
         //    confirmButtonText: 'Continuar'
         // }).then(function () {
         //    window.location.href="paginadestino.php"
         // }) 

