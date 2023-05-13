$(function () {

    $('[data-toggle="tooltip"]').tooltip();

    // Datatables
    $('table.tabla-datos').dataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ filas por página",
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

    $(".select2").select2({
        width: '100%'
    });

    ////$('.datepicker-start').on('click', function(){
    ////    console.log($(this).val());
    ////});
    //
    //$('.datepicker-start').datetimepicker({
    //    format: 'YYYY-MM-DD'
    //});
    //
    //
    //
    //$('.datepicker-end').datetimepicker({
    //    format: 'YYYY-MM-DD',
    //    useCurrent: false
    //});
    //
    //// Mostrar formulario de sobre
    //$('select.tipo-credito').on('change', function(){
    //    if ($(this).val() != 'personal'){
    //        $('fieldset.form-sobre-documento').show();
    //    } else {
    //        $('fieldset.form-sobre-documento').hide();
    //    }
    //});
    //
    //
    //$('#datepicker-left').datetimepicker({
    //    'format' : "YYYY-MM-DD", // HH:mm:ss
    //});

    //$('[data-toggle="tooltip"]').tooltip();
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
                //'<b class="glyphicon glyphicon-ok icon-message"></b>' +
            '<strong class="title-message">Correcto</strong>' +
            '<div class="message">'+ texto +'</div>' +
            '</div>';
    else if (tipo == 'warning')
        mensaje = '<div class="box-message">' +
                //'<b class="glyphicon glyphicon-warning-sign icon-message"></b>' +
            '<strong class="title-message">Advertencia</strong>' +
            '<div class="message">'+ texto +'</div>' +
            '</div>';
    else if (tipo == 'error')
        mensaje = '<div class="box-message message-error">' +
                //'<b class="glyphicon glyphicon-remove icon-message"></b>' +
            '<strong class="title-message">Error</strong>' +
            '<div class="message">'+ texto +'</div>' +
            '</div>';
    else if (tipo == 'information')
        mensaje = '<div class="box-message message-information">' +
                //'<b class="glyphicon glyphicon-info-sign icon-message"></b>' +
            '<strong class="title-message">Información</strong>' +
            '<div class="message">'+ texto +'</div>' +
            '</div>';
    else // tipo == 'notification'
        mensaje = '<div class="box-message">' +
                //'<b class="glyphicon glyphicon-cog icon-message"></b>' +
            '<strong class="title-message">Notificación</strong>' +
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
