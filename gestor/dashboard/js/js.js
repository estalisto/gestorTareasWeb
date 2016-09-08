function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

//funciones de alumno guardar editar
function grafica1() {
    alert('hola');
    var resultado = document.getElementById('diagramLine');
//    resultado.innerHTML = '<br><br><br><center><img src="img/45.gif"></center>';
    ajax = objetoAjax();
    ajax.open("GET", "barGrafico.php", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {

            resultado.innerHTML = ajax.responseText;
           // tables();
        }
    }
    ajax.send(null);
}

function carga_grafico(){

    alert('hola');
    /*
    id_concurso=document.frm_concurso.id_concurso.value;
    empresa=document.frm_concurso.id_empresa.value;
    fecha_ini_todas=document.frm_concurso.fecha_ini_todas.value;
    fecha_cierre_todas=document.frm_concurso.fecha_cierre_todas.value;
    hora_ini_todas=document.frm_concurso.hora_ini_todas.value;
    hora_cierre_todas=document.frm_concurso.hora_cierre_todas.value;
    vigencia_ini=document.frm_concurso.vigencia_ini.value;
    vigencia_cierre=document.frm_concurso.vigencia_cierre.value;
    des_vigencia_ini=document.frm_concurso.des_vigencia_ini.value;
    des_vigencia_cierre=document.frm_concurso.des_vigencia_cierre.value;*/
    
    
    //alert(id_empresa);
    //alert(id_referido);
    
   // jQuery("#tabla").html("<br/><br/><center><img alt='cargando' src='images/ajax-loader.gif' /><center>"); 
    jQuery("#diagramLine").load("barGrafico.php?,{},function(){ });
    }