<?php
require_once( 'menu.php' );



?>

<html>
<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.11.1/jquery-ui.css" />  
<html>
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/themes/Redmond/theme.css" /> 
 <link rel="stylesheet" type="text/css" href="librerias/font-awesome-4.6.3/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/primeui.min.css" />
<script type="text/javascript" src="librerias/jquery-1.11.1/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="librerias/jquery-ui-1.11.1/jquery-ui.js"></script>  
<script type="text/javascript" src="librerias/primeui-4.1.12/primeui.min.js"></script>
 

<script type="text/javascript">
$(function() {  
    $('#mb1').puimenubar({  
            autoDisplay: true  
        });  
          
        $('#mb2').puimenubar({  
            autoDisplay: false  
        });  
        $('#basic').puidropdown();
        $('#prioridadesID').puidropdown();
        $('#estadosID').puidropdown();
        $('#temasID').puidropdown();
        $('#userAsignadoID').puidropdown();



        $('#temasID').puidropdown();
        $('#default').puiinputtext(); 
        $('#default2').puifieldset();
        $('#observacionID').puiinputtextarea();

   
   
   
     });
$( function() {
    $( "#datepicker" ).datepicker();
  } );

</script>  
<body>

  <fieldset id="default2">
    <legend>Gestor Ingreso</legend>
 <table> <!-- Lo cambiaremos por CSS -->
           <tr><td>Áreas:</td></tr>
           <tr><td><select id="basic" name="basic">
                    <option value="0">Seleccione una área</option>
                    <option value="1">Fabrica de Software</option>
                    <option value="2">Facturacion Electronica</option>
                    <option value="3">BI</option>
                    <option value="4">Administracion</option>
                    </select> 
           </td></tr>
             <tr><td>Asignado:</td></tr>
           <tr><td><select id="userAsignadoID" name="basic">
                    <option value="0">Asignar Usuario</option>
                    <option value="1">Yessica</option>
                    <option value="2">Maluli</option>
                    <option value="3">Antonio</option>
           <tr><td>Solicitante:</td></tr>
           <tr><td><input id="default" type="text" value="@usuario1" />
           </td></tr>
           <tr><td>Temas:</td></tr>
           <tr><td><select id="temasID" name="basic">
                    <option value="0">Seleccione un Tema</option>
                    <option value="1">Capacitacion</option>
                    <option value="2">Soporte tecnico</option>
                    
                    </select> </td></tr>
           <tr><td>Prioridad:</td></tr>
           <tr><td><select id="prioridadesID" name="basic">
                    <option value="0">Prioridad</option>
                    <option value="1">Baja</option>
                    <option value="2">Media</option>
                    <option value="3">Alta</option>

                    </select></td></tr>
           
           <tr><td>Estado:</td></tr>
                      <tr><td><select id="estadosID" name="basic">
                    <option value="0">Escoja un estado</option>
                    <option value="1">Nuevo</option>
                    <option value="2">Asignado</option>
                    <option value="3">Atendido</option>
                    <option value="4">Cerrado</option>
                    </select></td></tr>

           <tr><td>Observación:</td></tr>
           <tr><td><textarea id="observacionID" ></textarea></td></tr>



           <tr><td>Fecha Compromiso:</td></tr>
           <tr><td>
               <input type="text" id="datepicker"></p>
           </td></tr>

         
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
  

</body>

</html>



