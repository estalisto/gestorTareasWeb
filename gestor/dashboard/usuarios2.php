<?php
//require_once( '/chartJS/samples/line.php' );
include "conexion/conexion.php";
require_once( 'configuraciones.php' );

$rs = $DB->Execute("select usuario ,nombres,apellidos,nivel_acceso from gestor_usuario");

//recorro arreglo
foreach ($rs as $x=>$dato) {
     $usuario[]=$dato; 
}


 ?>
<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Gestor 2016</title>
        <script src="chartJS/Chart.js"></script>
        <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.11.1/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/themes/Redmond/theme.css" />
 <link rel="stylesheet" type="text/css" href="librerias/font-awesome-4.6.3/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/primeui.min.css" />
<script type="text/javascript" src="librerias/jquery-1.11.1/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="librerias/jquery-ui-1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="librerias/primeui-4.1.12/primeui.min.js"></script>


    </head>
    <body>

<div class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row">
        <div class="ui-grid-col-12">
                  <ul id="mb1">
                    <li> <a data-icon="fa-home" href="/gestor/dashboard/"  >Incio</a>
                    </li>
                    <li> <a >Solicitud</a>
                    <ul>
                        <li><a data-icon="fa-pencil" href="/gestor/dashboard/pages/solicitudes/frm_gestor_ingreso3.php" >Nueva Solicitud</a>

                        </li>
                        <li><a data-icon="fa-search"  href="/gestor/dashboard/pages/solicitudes/frm_consultaSolicitudes2.php" >Ver Solicitudes</a></li>

                    </ul>
                </li>
               <!-- <li> <a data-icon="fa-contact">Reportes2</a>

                </li> -->
                <li>
                    <a data-icon="fa-gear">Administración</a>
                    <ul>
                        <li ><a data-icon="fa-pencil" href="usuarios.php">Usuarios</a></li>
                        <li><a data-icon="fa-pencil" href=" ">Areas</a></li>
                        <li><a data-icon="fa-pencil" href="/gestor/dashboard/campos_personalizados.php">Campos Personalizados </a></li>
                  <li><a data-icon="fa-pencil" href="">Temas</a></li>
                    </ul>

                </li>

                <li id="destroySesionID">
                    <a data-icon="fa-close" href="/gestor/dashboard/pages/cerrarSesion.php"  >Cerrar Sesion</a>
                </li>
            </ul>

        </div>
    </div>
</div>
 <br> <!-- Menu Vertical-->
        <h3></h3>
<div class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row">
        <div class="ui-grid-col-4">
        
                <ul id="tm2">
                    <li> 
                      <input id="usernamer" type="text" />
                       <button id="buscar" type="button">Buscar</button>
                    </li>
                    <li> <a data-icon="fa-align-justify">Estadísticas</a>
                        <ul> 
                            <li><a>Tareas Asignadas</a></li> 
                            <li><a>Tareas Realizadas</a></li> 
                        </ul>
                    </li>
                    <!--<li> <a data-icon="fa-edit">Edit</a>
                    
                        <ul>
                            <li><a data-icon="fa-mail-forward">Undo</a></li>
                            <li><a data-icon="fa-mail-reply">Redo</a></li>
                        </ul>
                    </li>-->

                    <li>
                        <a data-icon="fa-gears">Configuraciones</a>

                    </li>
                    <li>
                        <a data-icon="fa-close" href="/gestor/dashboard/pages/cerrarSesion.php"  >Cerrar Sesion</a>
                    </li>
                     <li>
                        <a data-icon="fa-question">Ayuda</a>             
                    </li>
                </ul>


        </div>
        <div class="ui-grid-col-12">
            <div style="width:100%">
                  <form  action="ingreso_usuarios.php" method="POST"  >
                 <div><input id="crear"  type="submit"  value="Crear Usuario" /></div>
                 </form>
                 <div id="tbllocal"></div> 
                 <div id="messages"></div> 
        </div>
        </div>
    </div>
</div>






        


    <script>
$(function() {  
        $('#tbllocal').puidatatable({  
            caption: 'usuarios',  
            paginator: {  
                rows: 10  
            },  
            columns: [  
                {field:'Usuario', headerText: 'Usuario', sortable:true},  
                {field:'Nombres', headerText: 'Nombres', sortable:true},  
                {field:'Apellidos', headerText: 'Apellidos', sortable:true},  
                {field:'Nivel Acceso', headerText: 'Nivel Acceso', sortable:true}  
            ],  
            datasource: [ 
                            
                <?php
                foreach($usuario as $x=>$y)
                  {
                   echo "{'Nombres':'".$y['nombres']."','Apellidos': '".$y['apellidos']."', 'Nivel Acceso':'".$niveles_acceso[$y['nivel_acceso']]."', 'Usuario':'".$y['usuario']."'},"; 
                   
                  }
                ?>
                  
            ], 
            selectionMode: 'single',
          
            rowSelect: function(event, data) {  
                $('#messages').puigrowl('show', [{severity:'info', summary: 'Opciones', detail: ('<p><a href="http://localhost/gestor/ingreso_usuarios.php">Editar Usuario:'+data.Usuario+'</a> </p> ')}]);  
            },  
            rowUnselect: function(event, data) {  
                $('#messages').puigrowl('show', [{severity:'info', summary: 'Row Unselected', detail: (data.Nombres + ' ' + data.Usuario)}]);  
            }  
        });  
  
        $('#messages').puigrowl();  
    });       


$('#pm').puipanelmenu();
 $('#usernamer').puiinputtext();
    $('#buscar').puibutton({
       icon: 'fa-search'
   });
    $('#mb1').puimenubar({
            autoDisplay: true
        });


    $('#tm2').puitieredmenu({
    autoDisplay: false
});
/***********/
$(window).bind("load", function() { 
       
       var footerHeight = 0,
           footerTop = 0,
           $footer = $("#footer");
           
       positionFooter();
       
       function positionFooter() {
       
                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
       
               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "absolute"
                   }).animate({
                        top: footerTop
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }
               
       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)
               
});

    </script>
    </body>
     <!-- footer start-->
        
<div id="footer"    >
   <h4 > Tesistas: Yessica Guachamin -  Bolivar Salazar  @Universidad De Guayaquil Carrera de Ingeniería en Sistemas </h4>
                  
</div>
            <!-- footer end-->
</html>
