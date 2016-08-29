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
    

         var localData = [
            {'id_temas': 'Capacitación', 'year': 2012, 'color': 'White', 'id_solicitud': 'dsad231ff'},
            {'id_temas': 'Capacitación', 'year': 2011, 'color': 'Black', 'id_solicitud': 'gwregre345'},
            {'id_temas': 'Soporte Técnico', 'year': 2005, 'color': 'Gray', 'id_solicitud': 'h354htr'},
            {'id_temas': 'Capacitación', 'year': 2003, 'color': 'Blue', 'id_solicitud': 'j6w54qgh'},
            {'id_temas': 'Soporte Técnico', 'year': 1995, 'color': 'White', 'id_solicitud': 'hrtwy34'},
            {'id_temas': 'Capacitación', 'year': 2005, 'color': 'Black', 'id_solicitud': 'jejtyj'},
            {'id_temas': 'Soporte Técnico', 'year': 2012, 'color': 'Yellow', 'id_solicitud': 'g43gr'},
            {'id_temas': 'Capacitación', 'year': 2013, 'color': 'White', 'id_solicitud': 'greg34'},
            {'id_temas': 'Soporte Técnico', 'year': 2000, 'color': 'Black', 'id_solicitud': 'h54hw5'},
            {'id_temas': 'Capacitación', 'year': 2013, 'color': 'Red', 'id_solicitud': '245t2s'}
        ];
 
        $('#tbllocal').puidatatable({
            caption: 'Consulta de Solicitudes',
            columns: [
                {field: 'id_solicitud', headerText: 'Solicitud', sortable: true},
                {field: 'id_temas', headerText: 'Temas', sortable: true},
                {field: 'year', headerText: 'Year', sortable: true},
                {field: 'color', headerText: 'Color', sortable: true}
            ],
            datasource: localData
        });
 
           $('#panelID').puifieldset();

    $('#mb1').puimenubar({  
            autoDisplay: true  
        });  
   
     });
$( function() {
    $( "#datepicker" ).datepicker();
  } );

</script>  
<body>
<br>
<br>
 

  <fieldset id="panelID">
    <legend>Consulta Solicitudes</legend>
 <div id="tbllocal"></div>
    
</fieldset>
  

</body>

</html>



