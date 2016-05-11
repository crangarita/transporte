
jQuery(document).ready(function($) {
    
    $(document).on({
        ajaxStart: function() { $("body").addClass("loading"); },
         ajaxStop: function() { $("body").removeClass("loading"); }    
    });

    $('select.form-control:not(.noestyle)').attr('data-live-search', true);
    $('select.form-control:not(.noestyle)').addClass('show-tick');
    $('select.form-control:not(.noestyle)').selectpicker();

    $('.paciente-vermas').click(function(event) {
        event.preventDefault();
        motrarGet($(this),BASE.url+'paciente/get/');
    });

    $('.consulta-vermas').click(function(event) {
        event.preventDefault();
        motrarGet($(this),BASE.url+'consulta/get/');
    });
});

function motrarGet (elemento, url) {
    $.post(url, {id: elemento.attr('data-id')}, function(data, textStatus, xhr) {
        if(data && data['error'] && trim(data['error'] )!=''){
            mostrarError(data['error']);
        }else{
            $('#myModal-default h4').html(elemento.attr('title'));
            var html = jsonAtable(data.datos);
            $('#myModal-default .modal-body').html(html);
            $('#myModal-default').modal();
        }
    },'json').fail(function() {location.reload(true);});
}