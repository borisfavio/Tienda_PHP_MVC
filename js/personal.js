$(document).on('ready', function(){
    //console.log('iniciando personal js');
    // AJAX de Formularios (Agregar y Modificar)
    $('form.form-datos').validator().on('submit', function(e){
        console.log('guardadndo...');
        var $this = $(this);
        if(e.isDefaultPrevented()){
            // Form Invalido
            generarAlerta('error', 'Corregir los Datos');
        }else{
            // Form Valido
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(resp){
                    console.log(resp);
                    if(resp.toString() == 'ok'){
                        // agregado exitoso
                        $this.clearForm();
                        generarAlerta('success', 'Los datos se guardaron correctamente');
                    }else{
                        // error
                        generarAlerta('warning', 'Error al guardar los datos');
                    }
                },
                error: function(jqXHR, status, error){
                    generarAlerta('error', 'No se pudo establecer una conexión con el Servidor');
                }
            });
            return 0;
        }
    }); // Fin de AJAX (Agregar y Modificar)
    

    // Acción de Eliminar Items
    $('table.tabla-datos tbody').on('click', 'a.ocultar-item', function(){
        console.log('ocultando...');
        var fila = $(this).parent().parent();
        var url = $('table.tabla-datos').data('url');
        console.log(url);
        var datos = {
            "id"        : $(this).data('id'),
            "operacion" : "ocultar"
        };
        swal({
            title: "Estas Seguro ?",
            text: "Borrar el registro de <strong>" + $(this).data('name') + "</strong>",
            html: true,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F0AD4E",
            confirmButtonText: "Borrar",
            cancelButtonText: "Cancelar"
        }, function(isConfirm){
            if(isConfirm) {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: datos,
                    success: function (resp) {
                        console.log(resp.toString());
                        if (resp.toString() == 'ok') {
                            fila.remove();
                            generarAlerta('success', 'El registro se elimino correctamente');
                        } else {
                            generarAlerta('error', 'No se pudo eliminar el registro');
                        }
                    }
                });
            }
        });
    }); // Fin de Ocultar

    $('table.tabla-datos tbody').on('click', 'a.ocultar-item-ciudades', function(){
        console.log('ocultando...');
        var fila = $(this).parent().parent();
        var url = $('table.tabla-datos').data('url');
        console.log(url);
        var datos = {
            "id"        : $(this).data('id'),
            "operacion" : "ocultar-ciudades"
        };
        swal({
            title: "Estas Seguro ?",
            text: "Borrar el registro de <strong>" + $(this).data('name') + "</strong>",
            html: true,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F0AD4E",
            confirmButtonText: "Borrar",
            cancelButtonText: "Cancelar"
        }, function(isConfirm){
            if(isConfirm) {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: datos,
                    success: function (resp) {
                        console.log(resp.toString());
                        if (resp.toString() == 'ok') {
                            fila.remove();
                            generarAlerta('success', 'El registro se elimino correctamente');
                        } else {
                            generarAlerta('error', 'No se pudo eliminar el registro');
                        }
                    }
                });
            }
        });
    }); // Fin de Ocultar


    // Acción de Eliminar Items
    $('table.tabla-datos tbody').on('click', 'a.eliminar-item', function(){
        console.log('eliminandooooooo...');
        var fila = $(this).parent().parent();
        var url = $('table.tabla-datos').data('url');
        console.log(url);
        var datos = {
            "id"        : $(this).data('id'),
            "operacion" : "borrar"
        };
        swal({
            title: "Estas Seguro ?",
            text: "Borrar el registro de <strong>" + $(this).data('name') + "</strong>",
            html: true,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F0AD4E",
            confirmButtonText: "Borrar",
            cancelButtonText: "Cancelar"
        }, function(isConfirm){
            if(isConfirm) {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: datos,
                    success: function (resp) {
                        console.log(resp.toString());
                        if (resp.toString() == 'ok') {
                            fila.remove();
                            generarAlerta('success', 'El registro se elimino correctamente');
                        } else {
                            generarAlerta('error', 'No se pudo eliminar el registro');
                        }
                    }
                });
            }
        });
    }); // Fin de Eliminar


    // Acción de Eliminar Items
    $('table#datatable_example tbody').on('click', 'a.eliminar-item', function(){
        console.log('eliminandooooooo...');
        var fila = $(this).parent().parent();
        var url = $('table#datatable_example').data('url');
        console.log(url);
        var datos = {
            "id"        : $(this).data('id'),
            "operacion" : "borrar"
        };
        swal({
            title: "Estas Seguro ?",
            text: "Borrar el registro de <strong>" + $(this).data('name') + "</strong>",
            html: true,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#F0AD4E",
            confirmButtonText: "Borrar",
            cancelButtonText: "Cancelar"
        }, function(isConfirm){
            if(isConfirm) {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: datos,
                    success: function (resp) {
                        console.log(resp.toString());
                        if (resp.toString() == 'ok') {
                            fila.remove();
                            generarAlerta('success', 'El registro se elimino correctamente');
                        } else {
                            generarAlerta('error', 'No se pudo eliminar el registro');
                        }
                    }
                });
            }
        });
    }); // Fin de Eliminar

    $('form#nuevo-cliente').validator().on('submit', function(e){
        var $this = $(this);
        console.log('guardando al cliente...');
        if(e.isDefaultPrevented()){
            // Form Invalido
            generarAlerta('error', 'Corregir los Datos');
        }else{
            // Form Valido
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(dato){
                    console.log(dato.respuesta);
                    if(dato.respuesta == 'ok'){
                        // agregado exitoso
                        $this.clearForm();
                        generarAlerta('success', 'Los datos se guardaron correctamente');
                        $('select[name=nom_cli]').prepend('<option value="' + dato.id_cliente + '">' + dato.nombre_cliente + '</option>');
                        $('select[name=nom_cli]').selectpicker('refresh');
                        // $('<li data-original-index="'+dato.id_cliente+'">'+'<a>'+'<span class="text">'+ dato.nombre_cliente+'</span>'+'</a>'+'</li>');
                    }else{
                        // error
                        generarAlerta('warning', 'Error al guardar los datos');
                    }
                },
                error: function(jqXHR, status, error){
                    generarAlerta('error', 'No se pudo establecer una conexión con el Servidor');
                }
            });
            return 0;
        }
    }); // Fin de AJAX (Agregar y Modificar)
    // Verificar usuario existente
    $('input.verificar-usuario').on('keyup', function(e){
        e.preventDefault();
        $.ajax({
            url: "comprobar.php",
            type: 'post',
            data: {buscar: $(this).val()},
            success: function(data){
                if (data.resp == 'duplicate') {
                    $('.resultado-cliente').html('<strong>Usuario ya Registrado.</strong>').css("color", "red");
                } else {
                    $('.resultado-cliente').html('<strong>Usuario Permitido.</strong>').css("color", "blue");
                }
            }
        });
    }); //Fin verificar
    // Verificar lote existente
    $('input.verificar-lote').on('keyup', function(e){
        e.preventDefault();
        $.ajax({
            url: "comprobar_lote.php",
            type: 'post',
            data: {buscarlo: $(this).val()},
            success: function(data){
                if (data.resp == 'duplicate') {
                    $('.resultado-lote').html('<strong>Lote ya Registrado.</strong>').css("color", "red");
                } else {
                    $('.resultado-lote').html('<strong>Lote Permitido.</strong>').css("color", "blue");
                }
            }
        });
    }); //Fin verificar

    $('input.icheck').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });
    $('input.icheck').on('ifChecked', function(){
        //$(this).children().attr('checked', 'checked');
        $('form.form-datos').validator('validate');
        //console.log($(this).children());
    });
    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();
    // Datepicker
    $(function () {
       $('.calendario').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'es'       
        });
        $('.calendario').data("DateTimePicker");
    });
    // hora datepicker
    $(function () {
        $('.hora').datetimepicker({
            format: 'LT'
        });
    });
    // Bootstrap Switch
    $('input[class="mi-bootstrap-switch"]').bootstrapSwitch({
        size: 'small',
        onColor: 'success'
    });
    // Datatables
    // $('table.tabla-datos').DataTable();
    $('table.tabla-datos').dataTable({
        "order": [[ 0, "desc" ]],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Filas por Página",
            "zeroRecords": "No hay Registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin Registros",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        },
        "scrollX": true
    });

    $('table.tabla-datos-al').dataTable({
        "order": [[ 1, "asc" ]],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Filas por Página",
            "zeroRecords": "No hay Registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin Registros",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        },
        "scrollX": true
    });

    $('button.prueba').click(function(){
        console.log(serializarForm($('form.form-datos-imagen input, form.form-datos-imagen textarea')));
    });

    /* Validar campos - Abrancho
     ************************************************************
     ************************************************************/
    $('.letras').keypress(function(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];
        tecla_especial = false;
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    });
    $('.letras-numeros-mayus').keypress(function(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-";
        especiales = [8, 37, 39, 46];
        tecla_especial = false;
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    });

    $('.letras-numeros').keypress(function(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789#.";
        especiales = [8, 37, 39, 46];
        tecla_especial = false;
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    });
    $('.numeros').keypress(function(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " 0123456789.-";
        especiales = [8, 37, 39, 46];
        tecla_especial = false;
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    });

});

/* Funciones auxiliares
 * Autor : Abraham Cabrera
 ***************************************************/
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
function generarAlerta(tipo, texto) {
    var mensaje;
    if (tipo == 'success')
    mensaje = '<div class="box-message">' +
        '<b class="glyphicon glyphicon-ok icon-message"></b>' +
        '<strong class="title-message"> Correcto</strong>' +
        '<div class="message">'+ texto +'</div>' +
        '</div>';
    else if (tipo == 'warning')
        mensaje = '<div class="box-message">' +
        '<b class="glyphicon glyphicon-warning-sign icon-message"></b>' +
        '<strong class="title-message"> Advertencia</strong>' +
        '<div class="message">'+ texto +'</div>' +
        '</div>';
    else if (tipo == 'error')
        mensaje = '<div class="box-message message-error">' +
        '<b class="glyphicon glyphicon-remove icon-message"></b>' +
        '<strong class="title-message"> Error</strong>' +
        '<div class="message">'+ texto +'</div>' +
        '</div>';
    else if (tipo == 'information')
        mensaje = '<div class="box-message message-information">' +
        '<b class="glyphicon glyphicon-info-sign icon-message"></b>' +
        '<strong class="title-message"> Información</strong>' +
        '<div class="message">'+ texto +'</div>' +
        '</div>';
    else // tipo == 'notification'
        mensaje = '<div class="box-message">' +
        '<b class="glyphicon glyphicon-cog icon-message"></b>' +
        '<strong class="title-message"> Notificación</strong>' +
        '<div class="message">'+ texto +'</div>' +
        '</div>';

    var n = noty({
        text        : mensaje,
        type        : tipo,
        dismissQueue: true,
        layout      : 'topRight',
        closeWith   : ['click'],
        theme       : 'relax',
        maxVisible  : 5,
        animation   : {
            open  : 'animated bounceInRight',
            close : 'animated bounceOutRight',
            easing: 'swing',
            speed : 50
        }
    });
    setTimeout(function(){
        $.noty.close(n.options.id);
    },5000);
    return n;
}