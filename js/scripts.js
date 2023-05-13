$(document).on('ready', function(){
    $('form.form-datos-comprobante').validator().on('submit', function(e){
        var $this = $(this);
        if(e.isDefaultPrevented()){
            generarAlerta('warning', 'Corregir los Datos requeridos');
        }else{
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(data){
                    console.log(data);
                    if(data.resp == 'ok'){
                        $this.clearForm();
                        $('.btn-comprobante').attr('href', '../ventaCtr/ventaReporte.php?id=' + data.id_venta + '&idc=' + data.id_cliente);
                        $('.btn-comprobante').show();
                        generarAlerta('success', 'Los datos se guardaron correctamente');  
                        $('tr.fila').remove();  
                    }else{
                        generarAlerta('warning', 'Error al guardar los datos');
                    }
                },
                error: function(jqXHR, status, error){
                    generarAlerta('error', 'No se pudo establecer una conexión con el Servidor');
                }
            });
            return 0;
        }
    });

    $('#addNew').on('click', function(e){
        console.log('procesando...');
        var idpro = $("#idp").val();
        var idcli = $("#idc").val();
        var producto = $("#producto").val();
        var cantidad = $("#cantidad").val();
        var precio   = $("#precio").val();
        var total = (parseFloat(cantidad) * parseFloat(precio)).toFixed(2);
        $("#producto").val('');
        $("#cantidad").val('');
        $("#precio").val('');
        $("#stock").html(0);
        var repetido = false;
        $('table#tabla tbody tr').each(function(index, elem){
            if ($(elem).attr('id') == idpro) {
                repetido = true;
            }
        });
        if(idpro != '' && cantidad != ''){
            if (!repetido) {
                // Dibujar
                var plantilla ='<tr class="fila" id="'+idpro+'">'+          
                    '<td>'+
                        '<div class="input-group">'+
                            '<span class="input-group-btn">'+
                                '<button type="button" class="btn btn-danger form-control remove">'+
                                    '<i class="glyphicon glyphicon-minus"></i>'+
                                '</button>'+
                            '</span>'+
                            '<input type="hidden" name="id_productos[]" value="'+idpro+'" />'+
                            '<input disabled class="form-control" type="text" placeholder="Nombre del producto" value="'+producto+'" />'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<input class="form-control cantidad-fila" type="number" readonly placeholder="Cantidad" name="cantidads[]" value="'+ cantidad +'"/>'+

                    '</td>'+
                    '<td>'+
                        '<div class="input-group">'+
                            '<span class="input-group-addon" id="basic-addon1">Bs/.</span>'+
                            '<input class="form-control precio-fila" type="text" readonly placeholder="Precio" name="precios[]" value="'+ precio +'" />'+
                        '</div>'+
                    '</td>'+
                    '<td class="total">'+
                        '<div class="input-group">'+
                            '<span class="input-group-addon">Bs/.</span>'+
                            '<input class="form-control total-pro" readonly type="text" name="totals[]" value="'+ total +'" />'+
                        '</div>'+
                    '</td>'+
                '</tr>';
                console.log('imprimiendo...');
                var contenido = $('table#tabla').append(plantilla);
                var total = 0; 
                $('table#tabla tbody tr td.total input').each(function(i, el){
                    total += parseFloat($(el).val());
                });
                $('.total-fila').val(total.toFixed(2));
       
                $("tr.fila").keyup(function(){
                    var val1 = parseFloat($(this).find(".cantidad-fila").val());
                    var val2 = parseFloat($(this).find(".precio-fila").val());
                    if(isNaN(val1)){val1=0;}
                    if(isNaN(val2)){val2=0;}  
                    var res = parseFloat(val1)*parseFloat(val2);
                    $(this).find(".total-pro").val(res.toFixed(2));
                    var total = 0; 
                    $('table#tabla tbody tr td.total input').each(function(i, el){
                        total += parseFloat($(el).val());
                    });
                    $('.total-fila').val(total.toFixed(2));
                });
            }else{
                generarAlerta('warning', 'Producto ya Ingresado');
            }
        }else{
            generarAlerta('warning', 'Error Ingrese los campos requeridos');
            $("#producto").focus(); 
        }
        return false;
    });

    $('table#tabla').on('click', '.remove', function(){
        console.log("Eliminando fila");
        $(this).parent().parent().parent().parent().remove();
        var total = 0; 
        $('table#tabla tbody tr td.total input').each(function(i, el){
            total += parseFloat($(el).val());
        });
            $('.total-fila').val(total.toFixed(2));
            var calc = (total*13)/(100);
            $('.iva-fila').val(calc.toFixed(2));
            var sub = (total-calc);
            $(".sub-total-fila").val(sub.toFixed(2));  
    });

    $("#producto").autocomplete({
        delay: 0,
        source: 'buscaProducto.php',
        // minLength: 2,
        select: function (event, ui) {
            $("#cantidad").focus();
            $("#precio").val(ui.item.costov);
            $("#idp").val(ui.item.id_prod); 
            // $("#stock").val(ui.item.stoc); 
            $("#stock").html(ui.item.stoc); 
            $("#cantidad").attr('max', ui.item.stoc);
            console.log(ui); 
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {  
        // console.log(item);
        return $( "<li></li>" )  
           .data( "item.autocomplete", item )  
           .append( "<a>" + "<img style='width:50px;height:50px' src='../../vista/productos/imagenesproducto/" + item.imgpro + "' /> " + '<strong>' + item.value + '</strong>' +'<br>'+ '<h6>Precio: <strong>' + item.costov + '</strong>' + ' / ' + 'Stock: <strong>' + item.stoc + '</strong></h6>' + "</a>" )
           .appendTo( ul );  
    }; 

    $("#cliente").autocomplete({
        source: 'buscaCliente.php',
        select: function (event, ui) {
            console.log(ui);
            $("#nit").val(ui.item.ci);
            $("#idc").val(ui.item.idc);    
        }
    });  

    $('form.form-datos-cliente').validator().on('submit', function(e){
        var $this = $(this);
        console.log('guardando al cliente...');
        if(e.isDefaultPrevented()){
            generarAlerta('error', 'Corregir los Datos');
        }else{
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(dato){
                    console.log(dato.respuesta);
                    if(dato.respuesta == 'ok'){
                        $this.clearForm();
                        generarAlerta('success', 'Los datos se guardaron correctamente');
                        $('.modal-operaciones').modal('hide');
                        $('input[name=cliente]').prepend('<li#ui-id-"'+dato.id_cliente+'">'+dato.nombre_cliente+'</li>');
                    }else{
                        generarAlerta('warning', 'Error al guardar los datos');
                    }
                },
                error: function(jqXHR, status, error){
                    generarAlerta('error', 'No se pudo establecer una conexión con el Servidor');
                }
            });
            return 0;
        }
    });
    // rar 7 - 67
    $("input.cantidad").keyup(function(){
        if (Number($("#cantidad").attr('max')) != '') {
            if (Number($(this).val()) > Number($("#cantidad").attr('max'))) {
                $(this).val(1);
                generarAlerta('information', 'Solo hay '+$("#cantidad").attr('max')+' unidades');
            }
        }else{
            $(this).val(0);
        }
    });
});

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
    // else if (tipo == 'information')
    //     mensaje = '<div class="box-message message-information">' +
    //     '<b class="glyphicon glyphicon-info-sign icon-message"></b>' +
    //     '<strong class="title-message"> Información</strong>' +
    //     '<div class="message">'+ texto +'</div>' +
    //     '</div>';
    else if (tipo == 'information')
        mensaje = '<div class="box-message message-information">' +
        '<b class="glyphicon glyphicon-info-sign icon-message"></b>' +
        '<strong class="title-message"> La cantidad supera el Stock</strong>' +
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
            speed : 500
        }
    });
    setTimeout(function(){
        $.noty.close(n.options.id);
    },5000);
    return n;
}   