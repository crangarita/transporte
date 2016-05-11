jQuery(document).ready(function($) {

    $(window).load(function () {
        twitter();
        setTimeout(function(){ twitter(); }, 1000); 
    });
    function twitter() {
        $("iframe[id^='twitter-widget-']").contents().find(".timeline").css("maxWidth", "none");
    }

    $('form.ajax').attr('onsubmit', 'return false;');
    $('form.ajax').submit(function(event) {
        event.preventDefault();
        var elmento = $(this);
        $.post(elmento.attr('action'), elmento.serialize(), function(data, textStatus, xhr) {
            if(data && data['error'] && trim(data['error'] )!=''){
                mostrarError(data['error']);
            }else{
                $('.cerrartabla'+elmento.children('input[name=tabla]').val()).click();//.removeClass('in');
            }
        },'json');
    });

    $("a.confirmar").click(function(event) {
        event.preventDefault();
        var elmento = $(this);
        var title='';
        if(elmento.attr('title')!=''){
            title=" que quiere "+elmento.attr('title');
        }
        if(title==''){
            title=" que quiere "+elmento.html();
        }

        var info = '';
        if(elmento.attr('data-info')!='' && elmento.attr('data-info')!=undefined){
            info = " ("+elmento.attr('data-info')+")";
        }
        bootbox.confirm("¿Está usted seguro"+title+"?"+info, function(result) {
            if(result){
                location.href = elmento.attr('href');
            }else{
                elmento.children('.fa').removeClass('fa-spin');
            }
        });
    });

	$('.string').keypress(function(evt){
        tecla = (document.all) ? evt.keyCode : evt.which;
        patron = /^[A-Za-z\s\xF1\xD1\xE1\xE9\xED\xF3\xFA\xFC]+$/;
        te = String.fromCharCode(tecla);  
        if (!patron.test(te)) {
            evt.preventDefault();
        } 
    });

    $('.alfanumerico').keypress(function(evt){
        tecla = (document.all) ? evt.keyCode : evt.which;
        patron = /^[A-Za-z0-9\s\xF1\xD1\xE1\xE9\xED\xF3\xFA\xFC]+$/;
        te = String.fromCharCode(tecla);  
        if (!patron.test(te)) {
            evt.preventDefault();
        } 
    });

    $(document).delegate('.integer', 'keypress', function(evt) {
        tecla = (document.all) ? evt.keyCode : evt.which;
        patron = /[0-9]/;
        te = String.fromCharCode(tecla);
        if (!patron.test(te)) {
            evt.preventDefault();
        }
    });
    
    $(document).delegate('.codigo', 'keyup', function(event) {
        patron = /^([0-9])*[A-Za-z]?[,]*$/;
        te = $(this).val();
        if (!patron.test(te)) {
            $(this).val(te.substring(0, te.length-1));
            evt.preventDefault();
        } 
    });

    

    $('.float').keyup(function(evt){
        patron = /^([0-9])*[.]?[0-9]*$/;
        te = $(this).val();
        if (!patron.test(te)) {
            $(this).val(te.substring(0, te.length-1));
            evt.preventDefault();
        } 
    });

    $('.float').keypress(function(evt){
        tecla = (document.all) ? evt.keyCode : evt.which;
        patron = /[0-9\.]/;
        te = String.fromCharCode(tecla);
        if (!patron.test(te)) {
            evt.preventDefault();
        } 
    });


    $("form").submit(function( event ) {
        requiredform(this,event);
	});
    

	$( document).delegate( "input.error", "change", function() {
	    $(this).removeClass( "error" );
	});

	$('.form-horizontal input.required:not([type="hidden"]),.form-horizontal textarea.required, div.required, select.required').parent(':not(.input-group)').append('<div class="required-icon"><div class="text">*</div></div>');
    $('.form-horizontal input.required:not([type="hidden"]),.form-horizontal textarea.required, div.required, select.required').parent('.input-group').parent().append('<div class="required-icon"><div class="text">*</div></div>');
    $('.form-horizontal .required-icon, label span.span').tooltip({
        placement: 'right',
        title: 'Campo Obligatorio'
    });
    
    $('.bootstrap-select > div > ul > li').tooltip();



    
        if($("table#dataTablesAdvanced").length>0 ){
            $('table#dataTablesAdvanced').dataTable({
                "order": [[ 0, "desc" ]],
                "processing": true,
                "responsive": true,
                "language": {"sProcessing": "Procesando...", "sLengthMenu": "Mostrar _MENU_ registros", "sZeroRecords": "No se encontraron resultados", "sEmptyTable":     "Ningún dato disponible en esta tabla", "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros", "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)", "sInfoPostFix":    "", "sSearch":         "Buscar:", "sUrl":            "", "sInfoThousands":  ",", "sLoadingRecords": "Cargando...", "oPaginate": {"sFirst":    "<<", "sLast":     ">>", "sNext":     ">", "sPrevious": "<"}, "oAria": {"sSortAscending":  ": Activar para ordenar la columna de manera ascendente", "sSortDescending": ": Activar para ordenar la columna de manera descendente"} }
            });
        }
        $('a.popup').click(function(event) {
        event.preventDefault();
        var _this = $(this);
        popupCenter(_this.attr('href'), _this.attr('title'), 580, 470);
    });
        
});

function requiredform (form,event) {
        $(form).find(":input").each(function() {
            var tag = $(this).prop("tagName");
            var type = $(this).attr('type');
            var val = $(this).val();

            if(tag=='INPUT' && type=='email' && val!=""){
                if(!validarEmail(val)){
                    event.preventDefault();
                    $(this).focus();
                    $(this).addClass('error');
                    mostrarError('La dirección de correo '+ val +' es incorrecta');
                    return false;
                }
            }

            if( tag=='INPUT' && val!="" && $(this).hasClass("integer") && !isInt(val)){
                event.preventDefault();
                $(this).addClass('error');
                mostrarError("<b>"+val+"</b> no es un valor entero valido");
                return false;
            }
            if( tag=='INPUT' && val!="" && $(this).hasClass("float") && ( !isFloat(val) && !isInt(val) )){
                event.preventDefault();
                $(this).addClass('error');
                mostrarError("<b>"+val+"</b> no es un valor decimal o entero valido");
                return false;
            }

            if( val=="" && (tag=='INPUT' || tag=='SELECT' || tag=='TEXTAREA' ) && $(this).hasClass("required") ){
                event.preventDefault();
                $(this).addClass('error');
                $(this).focus();
                if($(this).attr('placeholder') != undefined){
                    mostrarError('Debe digitar o seleccionar el campo: '+$(this).attr('placeholder'));
                }else{
                    mostrarError();
                }

                if(tag=='SELECT'){
                    //$(this).parent().children('.bootstrap-select').children('.btn').click();
                }
                return false;
            }
        });
            return true;
        
    }

function jsonAtable(jsontem) {
    var html = '';
    var jsons = {};

    if(jsontem){
        html = '<div class="table-responsive"><table class="table table-hover table-striped table-condensed">';
        $.each(jsontem, function(index, val) {
            if(isJson(val)){
                jsons[index]=jsonAtable(val)
            }else if(val && val!=''){
                html+='<tr>';
                html+='<th>';
                html+=index;
                html+='</th>';
                html+='<td>';
                html+=val;
                html+='</td>';
                html+='</tr>';
            }
        }); 
        html+='</table></div>';
    }
    $.each(jsons, function(index, val) {
       html+='<p><strong>'+index+': </strong></p>';
       html+=val;
    });
    
    return html;
}

function isJson (data) {
    if(typeof(data)!='object'){
        return false;
    }else{
        return true;
    }
}

function isInt(n) 
{
    return n != "" && !isNaN(n) && Math.round(n) == n;
}
function isFloat(n){
    return n != "" && !isNaN(n) && Math.round(n) != n;
}
function MaysPrimera(string){ 
    return string.charAt(0).toUpperCase() + string.slice(1); 
}
function validarAlfanumerico(e,sinspace){

    if(!validarLetras(e,sinspace)){ 
        if(!validarNumeros(e)){ 
            return false;
        }
    }
    return true;
}
function validarLetras(e,sinspace) { 
    tecla = (document.all) ? e.keyCode : e.which;
    if(!sinspace){
if (tecla==32) {return true;} // espacio
if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
}
if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
if (tecla==8) return true; // backspace  
if (tecla==13) return true; // intro

patron = /[a-zA-Z]/; //patron

te = String.fromCharCode(tecla); 
return patron.test(te); // prueba de patron
} 
function validarNumeros(evt){
    tecla = (document.all) ? evt.keyCode : evt.which; 
    if (tecla < 48 || tecla > 57){ 
        return false;
    }
    return true;
}
function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        return false;
    return true;
}
var myTimeError;
function mostrarError (msj) {
    if(msj){
        msj = msj; 
    }else{
        msj = 'Los campos marcados con <span class="span">*</span> son obligatorios.';
    }
    //clearTimeout(myTimeError);
    var msjAlert='<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+msj+'</div>';
    if($("div.modal.in").length > 0 && $("div.modal.in .modal-body .error").length > 0){
        $("div.modal.in .modal-body div.error").html(msjAlert);
    }else
    $('div#alert').html($('div#alert').html()+msjAlert);
    //$("div.alert-danger").stop().show("slow");
    //myTimeError = setTimeout(function(){$("div.alert-danger").hide("slow");},9000)
}

function selecte (obj) {
    var options='';
    $.each(obj, function(key, item) {
        var titulo ='';
        if(item.titulo){
            titulo ='title="'+item.titulo+'"';
        }
        options+='<option '+titulo+' value="'+item.id+'">'+item.nombre+'</option>'
    });
    return options;
}
function trim(cadena){
       cadena=cadena.replace(/^\s+/,'').replace(/\s+$/,'');
       return(cadena);
}
function textareaAuto(id) {
    $(document).find(id).each(function() {
        $(this).css('height', 16);
        var h = $(this).prop("scrollHeight");
        $(this).css('height', h+2);
    })
}

function jsonVacuum (jsons) {

    for (var i = jsons.length - 1; i >= 0; i--) {
        var obj = jsons[i];
        if(obj['value']==''){
            delete jsons[i];
        }      
    };
    return jsons;
}

function exportar(id,tipo,archivo,descargar,evento) {
        if(!id){
            return false;
        }
        
        arreglarTabla(id);
        if(!descargar && descargar!= false){
            descargar = true;
        }
        if(!tipo){
            tipo = 'PDF';
        }
        if(!evento){
            evento = false;
        }
       
        var html = '';
        $(document).find(id).each(function() {     
           html+= $("<div>").append( $(this).clone()).html()+'<br/>'
        });
        html = html.split("display:none").join("");
        html = html.split("<table").join( '<table border="1" cellpadding="10" cellspacing="0" bordercolor="#666666" style="border-collapse:collapse; width: 100%"');
        html+='<style type="text/css"> th.title{  background-color: #ccc;} table{ width: 100%;} table td{padding:3px;}table th{padding:5px 3px;}</style>';
        
        var style='<title>'+BASE.name+'</title><style type="text/css">p{text-align: center;}table{width: 99%; border-spacing: 2px;border-collapse: collapse;font-size: 12px;margin: 0 auto;}body {margin: 0;font-family: Arial, sans-serif;}table, td, th {border: 1px silver solid;}td {text-align: left;vertical-align: top;}th{color: #357ebd;}ul {list-style: circle;} table.noBorde,table.noBorde td, table.noBorde th{ border: 0px silver solid; } a{text-decoration: none; color: #000;}</style>';
        var ventimp = window.open(' ', 'popimpr');
        ventimp.document.write( style +html );
        /*ventimp.document.close();
        ventimp.print();
        ventimp.close();*/
        //window.open(BASE.url+'exportar/'+tipo+'/');
        /*$.post( BASE.url+'exportar/'+tipo+'/',{'html':html,'archivo':archivo},function(data){
            if(descargar){
                //console.log(BASE.url+'exportar/descargar/'+data);
                location.href= BASE.url+'exportar/descargar/'+data;
            }
            console.log(data);
            if(evento){
                eval(evento);
            }
        })*/
    }

    function arreglarTabla (id) {
        $(id+' :input').each(function(index, el) {
            var type = String($(el).attr('type'));
            type = trim(type.toLowerCase());

            var tag = String($(el).prop("tagName"));
            tag= trim(tag.toLowerCase());
           
            var val = '-';

            if(tag=='select'){
               val = $(el).find('option:selected').text();
            }
            if( (tag=='input' && type!='checkbox')||tag=='textarea'  ) {
                if($(el).val()!=''){
                    val = $(el).val();
                }
            }
            if(tag=='input' && type=='checkbox'){
                if($(el).prop( "checked")){
                    val='Si';
                }else{
                    val='No';
                }
            }

            $(el).parent().html(val);

        });
    }

function imprSelec(nombre)
{
var style='<title>'+BASE.name+'</title><style type="text/css">p{text-align: center;}table{width: 99%; border-spacing: 2px;border-collapse: collapse;font-size: 9px;margin: 0 auto;}body {margin: 0;font-family: Arial, sans-serif;}table, td, th {border: 1px silver solid;}td {text-align: left;vertical-align: top;}th{color: #B02726;}ul {list-style: circle;} table.noBorde,table.noBorde td, table.noBorde th{ border: 0px silver solid; } a{text-decoration: none; color: #000;}</style>';
    var ficha = document.getElementById(nombre);
    var ficha2 = document.getElementById('imp2');
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( style + ficha2.innerHTML+ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
}

function excel(table) {
        var html = '';
        $(document).find('table'+table).each(function() {     
           html+= $("<div>").append( $(this).clone()).html()+'<br/><br/>'
        });
        html = html.split("<table").join( "<table "+'border="1" cellpadding="10" cellspacing="0" bordercolor="#666666" style="border-collapse:collapse;"');
        html = html.split("display: none;").join('');
        html = html.split("<th ").join('<th style="background: #285e8e; color:#fff; font-weight: 700;"');
        html = html.split('class="odd"').join('style="background: #f8f8f8;"');

        url = "data:application/vnd.ms-excel;base64," + $.base64.encode(html);
        //popupCenter(url, "Generar Excel", 580, 470);
        return url;
       
    }

    jQuery(document).ready(function($) {

        $(window).load(function() {
            setTimeout(function(){
            if($('a.exceleTable').length >0){
                var elmento = $('a.exceleTable');
                var url = excel('.table');
                elmento.attr('href', url);
            }
        }, 1000); 
        });

        
    });

    function popupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 3) - (h / 3)) + dualScreenTop;

        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (newWindow == null || typeof(newWindow)=='undefined') {
            alert('Por favor deshabilita el bloqueador de ventanas emergentes y vuelve a hacer clic.');
        }else if (window.focus) {
            newWindow.focus();
        }

    }

;jQuery.base64=(function($){var _PADCHAR="=",_ALPHA="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",_VERSION="1.0";function _getbyte64(s,i){var idx=_ALPHA.indexOf(s.charAt(i));if(idx===-1){throw"Cannot decode base64"}return idx}function _decode(s){var pads=0,i,b10,imax=s.length,x=[];s=String(s);if(imax===0){return s}if(imax%4!==0){throw"Cannot decode base64"}if(s.charAt(imax-1)===_PADCHAR){pads=1;if(s.charAt(imax-2)===_PADCHAR){pads=2}imax-=4}for(i=0;i<imax;i+=4){b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6)|_getbyte64(s,i+3);x.push(String.fromCharCode(b10>>16,(b10>>8)&255,b10&255))}switch(pads){case 1:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6);x.push(String.fromCharCode(b10>>16,(b10>>8)&255));break;case 2:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12);x.push(String.fromCharCode(b10>>16));break}return x.join("")}function _getbyte(s,i){var x=s.charCodeAt(i);if(x>255){throw"INVALID_CHARACTER_ERR: DOM Exception 5"}return x}function _encode(s){if(arguments.length!==1){throw"SyntaxError: exactly one argument required"}s=String(s);var i,b10,x=[],imax=s.length-s.length%3;if(s.length===0){return s}for(i=0;i<imax;i+=3){b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8)|_getbyte(s,i+2);x.push(_ALPHA.charAt(b10>>18));x.push(_ALPHA.charAt((b10>>12)&63));x.push(_ALPHA.charAt((b10>>6)&63));x.push(_ALPHA.charAt(b10&63))}switch(s.length-imax){case 1:b10=_getbyte(s,i)<<16;x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_PADCHAR+_PADCHAR);break;case 2:b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8);x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_ALPHA.charAt((b10>>6)&63)+_PADCHAR);break}return x.join("")}return{decode:_decode,encode:_encode,VERSION:_VERSION}}(jQuery));