<?php
//require_once( '/chartJS/samples/line.php' );
include "conexion/conexion.php";
require_once( 'configuraciones.php' );

$rs = $DB->Execute("select nombre,descripcion from gestor_areas where estado='A'");
$rs_area = $DB->Execute("select id_tema, nombre from gestor_temas where estado='A'");


//recorro arreglo
foreach ($rs as $x=>$dato) {
     $usuario[]=$dato; 
}

foreach ($rs_area as $y=>$area) {
     $areas[]=$area; 
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
			            <li ><a data-icon="fa-pencil" href="usuarios2.php">Usuarios</a></li>
			            <li><a data-icon="fa-pencil" href="areas2.php">Areas</a></li>
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
			 <div><button id="nuevo" type="button">Nuevo</button> <button id="editar" type="button">Editar</button><button id="configurar" type="button">Configurar</button><button id="eliminar" type="button">Eliminar</button>
			 <div id="dlgcrear" title="Nueva Area">
			     
			  <table class="width50" cellspacing="1" >
			   <tr>
			    <td class="ui-state-default">Nombre</td>
			    <td><input id="nombre" name="nombre" type="text" /></td>
			   </tr>
			   <tr>
			    <td class="ui-state-default">Descripcion</td>
			    <td><textarea id="descripcion" name="descripcion" rows="5" cols="30"></textarea></td>
			   </tr>

			</table>
			 
			</div>
			<div id="dlgeditar" title="Nueva Area">
			     
			  <table class="width50" cellspacing="1" >
			   <tr>
			    <td class="ui-state-default">Nombre</td>
			    <td><input id="nombreditar" name="nombreditar" type="text"  disabled /></td>
			   </tr>
			   <tr>
			    <td class="ui-state-default">Descripcion</td>
			    <td><textarea id="descripcioneditar" name="descripcioneditar" rows="5" cols="30"></textarea></td>
			   </tr>

			</table>
			 
			</div>
			<div id="dlgeliminar" title="Emininar area">
						<p>Esta seguro de eliminar el area</p>
						
					</div>
					
			<div id="dlgconfigurar" name="dlgconfigurar"  title="Configurar Area">
			   <h3 class="first">Temas</h3>
			   <div id="conftemas">
			   <select name="no_temas" id="no_temas">
			   </select>
			   <select name="si_temas" id="si_temas">
			   </select>
			   </div>
			     <h3 class="first">Usuarios</h3>
			   <div id="confusuarios">
			   <select name="no_usuarios" id="no_usuarios">
			   </select>
			   <select name="si_usuarios" id="si_usuarios">
			   </select>
			   </div>   
			</div>		
			 </div>
			 </form>
			 <div id="tbllocal"></div> 
			 <div id="messages"></div> 
		</div>
        </div>
    </div>
</div>






		


	<script>
	$(function() { 
        $('#nombre').puiinputtext();
        $('#descripcion').puiinputtextarea({autoResize:true});
        $('#nombreditar').puiinputtext();
        $('#descripcioneditar').puiinputtextarea({autoResize:true}); 
        $('#conftemas').puipicklist({
					filter: true,
					responsive: true,
					sourceCaption: 'Disponibles',
                    targetCaption: 'Configurados'});
        $('#confusuarios').puipicklist({
					filter: true,
					responsive: true,
					sourceCaption: 'Disponibles',
                    targetCaption: 'Configurados'});		    
		
        $('#tbllocal').puidatatable({  
            caption: 'Areas',  
            paginator: {  
                rows: 10  
            },  
            columns: [  
                {field:'Nombre', headerText: 'Nombre', sortable:true},  
                {field:'Descripcion', headerText: 'Descripcion', sortable:true}  
            ],  
            datasource: [ 
                			
			    <?php
				foreach($usuario as $x=>$y)
                  {
                   echo "{'Nombre':'".$y['nombre']."','Descripcion': '".$y['descripcion']."'},"; 
				   
				  }
				?>
                  
            ], 
            selectionMode: 'single',
		                
        });  
  
        $('#messages').puimessages();  
		
		$('#nuevo').puibutton({
        icon: 'fa-plus',
        click: function() {
            $('#dlgcrear').puidialog('show');
        }
    });
	$('#editar').puibutton({
        icon: 'fa-plus',
        click: function() {
            var selections = $('#tbllocal').puidatatable('getSelection');
            if (selections.length === 1) {
						if (selections[0]) {
						     $("input[name='nombreditar']").val(selections[0].Nombre);
							 $("textarea[name='descripcioneditar']").val(selections[0].Descripcion);
							 $('#dlgeditar').puidialog('show');
							 
						}
					} else {
					        $('#messages').puimessages('show', 'info', {summary: '', detail: 'Por favor seleccione un área!'});
				               }
        }
    });
	
	$('#configurar').puibutton({
        icon: 'fa-gear',
        click: function() {
		
				var selections = $('#tbllocal').puidatatable('getSelection');
				
				if (selections.length === 1)
				{
				 var nombre1 = selections[0].Nombre;
				 //obtengo los temas no configurados
				   jQuery.post("consultas.php", {
						nombre1:nombre1,
						bandera: '1'
					}, function(data1, textStatus){
						
						if(data1 !=''){
						   var array1 = data1.split("|");
						   var target = new Array();
						   var linea;
						  for (var x=0;x<array1.length;x++)
						     {
						       
						       if(array1[x]!='')
							{
								a=array1[x];
								targetArray= a.split("-");
								target[x]={label:targetArray[1], value:targetArray[0]};
															
                                                        } 						 
						      }
						        
                                                        if (target[0]['value']>0){  
                                                        $('#conftemas').puipicklist({
						        sourceData: target
						        });
							}
							else
							{
							 $('#conftemas').puipicklist({
						        sourceData: ''
						        });
							}
						}
					});
				 
                                   //obtengo los temas ya configurados
				   jQuery.post("consultas.php", {
						nombre1:nombre1,
						bandera: '2'
					}, function(data, textStatus){
					        if(data !=''){
						   var array1 = data.split("|");
						   var target = new Array();
						   var linea;
						  for (var x=0;x<array1.length;x++)
						     {
						       
						       if(array1[x]!='')
							{
								a=array1[x];
								targetArray= a.split("-");
								target[x]={label:targetArray[1], value:targetArray[0]};
																
                                                        } 						 
						      }
						        
                                                        if (target[0]['value']>0){  
                                                        $('#conftemas').puipicklist({
						        targetData: target
						        });
							}
							else
							{
							 $('#conftemas').puipicklist({
						        targetData: ''
						        });
							}
						}
					});			 
				            
					
				      $('#dlgconfigurar').puidialog('show');
				}
				else
				{
				$('#messages').puimessages('show', 'info', {summary: '', detail: 'Por favor seleccione un área!'});
				}
           
        }
    });
	$('#eliminar').puibutton({
        icon: 'fa-plus',
        click: function() {
		
				var selections = $('#tbllocal').puidatatable('getSelection');
				if (selections.length === 1)
				{
				 $('#dlgeliminar').puidialog('show');
				}
				else
				{
				 $('#messages').puimessages('show', 'info', {summary: '', detail: 'Por favor seleccione un área!'});
				}
           
        }
    });
	
	
	$('#dlgcrear').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: true,
        maximizable: true,
        responsive: true,
        minWidth: 300,
		width:500,
        modal: true,
        buttons: [{
                text: 'Cancelar',
                icon: 'fa-close',
                click: function() {
                    $('#dlgcrear').puidialog('hide');
                }
            },
            {
                text: 'Crear',
                icon: 'fa-save',
                click: function() {
				
				        if($('#nombre').val()==""){
					          $('#messages').puimessages('show', 'info', {summary: '', detail: 'Ingrese el campo nombre'});
						 
						return false;
					    }
					    else{
					    	var nombre = $('#nombre').val();
					    }
						
						 if($('#descripcion').val()==""){
						 $('#messages').puimessages('show', 'info', {summary: '', detail: 'Ingrese el campo descripcion'});
						 
						return false;
					    }
					    else{
					    	var descripcion = $('#descripcion').val();
					    }
						jQuery.post("registra_area.php", {
						nombre:nombre,
						descripcion:descripcion
					}, function(data, textStatus){
						if(data == 1){
						    $('#messages').puimessages('show', 'info', {summary: '', detail: 'Area registrada correctamente'});
						  $('#dlgcrear').puidialog('hide');
						  setTimeout ("location.reload();", 3000);   
						}
						
						if(data == 2){
						     $('#messages').puimessages('show', 'info', {summary: '', detail: 'Ha ocurrido un error...!'});
						     
						}
						
						if(data == 3){
						     $('#messages').puimessages('show', 'info', {summary: '', detail: 'Este registro ya existe!'}); 
						     
						}
						
						
						
						
						
					});

				
                  
                }
            }
        ]
    });
	
	$('#dlgeditar').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: true,
        maximizable: true,
        responsive: true,
        minWidth: 300,
		width:500,
        modal: true,
        buttons: [{
                text: 'Cancelar',
                icon: 'fa-close',
                click: function() {
                    $('#dlgeditar').puidialog('hide');
                }
            },
            {
                text: 'Crear',
                icon: 'fa-save',
                click: function() {
				
				        if($('#nombreditar').val()==""){
					         $('#messages').puimessages('show', 'info', {summary: '', detail: 'Ingrese el campo nombre'}); 
						 
						return false;
					    }
					    else{
					    	var nombre = $('#nombreditar').val();
					    }
						
						 if($('#descripcioneditar').val()==""){
						 $('#messages').puimessages('show', 'info', {summary: '', detail: 'Ingrese el campo descripcion'});
						 
						return false;
					    }
					    else{
					    	var descripcion = $('#descripcioneditar').val();
					    }
						jQuery.post("actualizacion_area.php", {
						nombre:nombre,
						descripcion:descripcion
					}, function(data, textStatus){
						if(data == 1){
						   $('#messages').puimessages('show', 'info', {summary: '', detail: 'Area actualizada correctamente'});
						   $('#dlgeditar').puidialog('hide');
						   setTimeout ("location.reload();", 3000);
						}
						
						if(data == 2){
						     $('#messages').puimessages('show', 'info', {summary: '', detail: 'Ha ocurrido un error...!'});
						     
						}
						
							
						
					});

				
                  
                }
            }
        ]
    });
	
	
	$('#dlgeliminar').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: true,
        maximizable: true,
        responsive: true,
        minWidth: 300,
        modal: true,
        buttons: [{
                text: 'Cancelar',
                icon: 'fa-close',
                click: function() {
                    $('#dlgeliminar').puidialog('hide');
                }
            },
            {
                text: 'Eliminar',
                icon: 'fa-minus',
                click: function() {
				var selections = $('#tbllocal').puidatatable('getSelection');
				var nombre = selections[0].Nombre;
					jQuery.post("eliminacion_area.php", {
						nombre:nombre
					}, function(data, textStatus){
						if(data == 1){
						    $('#messages').puimessages('show', 'info', {summary: '', detail: 'Area eliminada correctamente'});
						    $('#dlgeliminar').puidialog('hide');
						    setTimeout ("location.reload();", 3000);
							 
							}
						else
						{
						if(data == 2){
						     $('#messages').puimessages('show', 'info', {summary: '', detail: 'Ha ocurrido un error...!'});
						     
						}
						
						}
						
						
						
					});

				
                  
                }
            }
        ]
    });
	
	$('#dlgconfigurar').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: true,
        maximizable: true,
        responsive: true,
	closable: false,
        minWidth: 300,
		width:500,
        modal: true,
        buttons: [{
                text: 'Cancelar',
                icon: 'fa-close',
                click: function() {
                    $('#dlgconfigurar').puidialog('hide');
		    $('#messages').puimessages('clear');
                }
            },
            {
                text: 'Agregar Temas',
                icon: 'fa-plus',
                click: function() {
				var selections = $('#tbllocal').puidatatable('getSelection');
				var nombre = selections[0].Nombre;
				if($('#si_temas').val()==null){
				                 $('#messages').puimessages('show', 'info', {summary: '', detail: 'No hay temas a configurar'});
						 $('#messages').puimessages('life',1000);
						 return false;
					}
					else{
					   var tema=$('#si_temas').text();
					   											
					}
				         
					jQuery.post("configuracion_area.php", {
					    nombre:nombre,
						tema:tema
					}, function(data, textStatus){
					
					 $('#messages').puimessages('show', 'info', {summary: '', detail: data});
					           $('#dlgconfigurar').puidialog('hide');
						   setTimeout ("location.reload();", 3000);
					   
						
					});

				
                  
                }
            }
        ]
    });
	
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
	 	
<div id="footer"	>
   <h4 > Tesistas: Yessica Guachamin -  Bolivar Salazar  @Universidad De Guayaquil Carrera de Ingeniería en Sistemas </h4>
			      
</div>
            <!-- footer end-->
</html>
