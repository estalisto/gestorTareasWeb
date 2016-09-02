<?php
//require_once( 'menu.php' );
//require_once( '/chartJS/samples/line.php' );

 ?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gestor 2016</title>
    <script src="../../chartJS/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="../../librerias/jquery-ui-1.11.1/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="../../librerias/primeui-4.1.12/themes/Redmond/theme.css" />
 <link rel="stylesheet" type="text/css" href="../../librerias/font-awesome-4.6.3/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="../../librerias/primeui-4.1.12/primeui.min.css" />
<script type="text/javascript" src="../../librerias/jquery-1.11.1/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../librerias/jquery-ui-1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="../../librerias/primeui-4.1.12/primeui.min.js"></script>


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
                  <li ><a data-icon="fa-pencil" href="../../usuarios2.php">Usuarios</a></li>
                  <li><a data-icon="fa-pencil" href="../../areas2.php">Areas</a></li>
                  <li><a data-icon="fa-pencil" href="../../campos_personalizados.php">Campos Personalizados </a></li>
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
        <div class="ui-grid-col-8">
          <div style="width:50%">
      <div>
       <table whith =400>
      <tr><td>
  <fieldset id="default2">
    <legend>Gestor Ingreso</legend>
 <table> <!-- Lo cambiaremos por CSS -->
           <tr><td>Áreas:</td><td><select id="areasID" name="basic">
                    <option value="0">Seleccione una área</option>
                    <option value="1">Fabrica de Software</option>
                    <option value="2">Facturacion Electronica</option>
                    <option value="3">BI</option>
                    <option value="4">Administracion</option>
                    </select></td></tr>
           <tr><td>
           </td></tr>
             <tr><td>Asignado:</td><td><select id="userAsignadoID" name="basic">
                      <option value="0">Asignar Usuario</option>
                      <option value="1">Yessica</option>
                      <option value="2">Maluli</option>
                      <option value="3">Antonio</option></select></td></tr>

           <tr><td>Solicitante:</td><td><input id="default" type="text" value="@usuario1" /></td></tr>


           <tr><td>Temas:</td><td><select id="temasID" name="basic">
                    <option value="0">Seleccione un Tema</option>
                    <option value="1">Capacitacion</option>
                    <option value="2">Soporte tecnico</option>

                    </td></tr>

           <tr><td>Prioridad:</td><td><select id="prioridadesID" name="basic">
                    <option value="0">Prioridad</option>
                    <option value="1">Baja</option>
                    <option value="2">Media</option>
                    <option value="3">Alta</option>

                    </select></td></tr>


           <tr><td>Estado:</td><td><select id="estadosID" name="basic">
         <option value="0">Escoja un estado</option>
         <option value="1">Nuevo</option>
         <option value="2">Asignado</option>
         <option value="3">Atendido</option>
         <option value="4">Cerrado</option>
         </select></td></tr>
           <tr><td>Observación:</td><td><textarea id="observacionID" ></textarea></td></tr>
           <tr><td>Fecha Compromiso:</td><td> <input type="text" id="datepicker"></p></td></tr>

 <tr><td></td><td><button id="btn-ingresar" type="button">Registrar</button></p></td></tr>

        </table>

<!--
        'PRIORIDAD', -- baja, media, alta
        'ESTADO', -- nuevo, asignado, atendido, cerrado
        'OBSERVACION',
        'FECHA_CREACION',NOW()
        'FECHA_COMPROMISO',-- actualizable
        'FECHA_ACTUALIZACION',-- actalizable-- aud
        'USUARIO_CREACION',
        'USUARIO_ACTUALIZACION',
        'PC_CREACION',-- no va
        'PC_ACTUALIZACION');

-->

</fieldset>
</td></tr>
</table>



      </div>
    </div>
        </div>
    </div>
</div>






    


  <script>
   $(function() {
    $('#mb1').puimenubar({
            autoDisplay: true
        });

        $('#mb2').puimenubar({
            autoDisplay: false
        });
        $('#areasID').puidropdown();
        $('#prioridadesID').puidropdown();
        $('#estadosID').puidropdown();
        $('#temasID').puidropdown();
        $('#userAsignadoID').puidropdown();



        $('#temasID').puidropdown();
        $('#default').puiinputtext();
        $('#default2').puifieldset();
        $('#observacionID').puiinputtextarea();
   $('#btn-ingresar').puibutton().click(function() {});



     });
$( function() {
    $( "#datepicker" ).datepicker();
  } );

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
<div id="footer"  >
   <h4 > Tesistas: Yessica Guachamin -  Bolivar Salazar  @Universidad De Guayaquil Carrera de Ingeniería en Sistemas </h4>
            
</div>
            <!-- footer end-->
</html>
