<?php
require_once( 'menu.php' );
require_once( 'configuraciones.php' );

$rs = $DB->Execute("select nombre ,tipo_dato,valores_posibles,mostrar_llenar,mostrar_actualizar,mostrar_cerrar,requerido_llenar,requerido_actualizar,requerido_cerrar from gestor_campo_personalizado where estado='A' order by nombre");

//recorro arreglo
foreach ($rs as $x=>$dato) {
     $campo[]=$dato; 
}

?>
<html>
 

<script type="text/javascript"> 
$(function() {
$('#messages').puigrowl(); 		   
		    $('#nombre').puiinputtext();
            $('#tipo').puidropdown();
            $('#posibles').puiinputtext();	
            $('#mllenar').puiinputtext();
            $('#mactualizar').puiinputtext();			
            $('#mcerrar').puiinputtext();
			$('#rllenar').puiinputtext();
			$('#ractualizar').puiinputtext();
			$('#rcerrar').puiinputtext();
			$('#nomb').puiinputtext();		   
		    $('#nombrea').puiinputtext();
			$('#tipoa').puidropdown();
			$('#mllenara').puicheckbox();
            $('#mactualizara').puicheckbox();			
            $('#mcerrara').puicheckbox();
			$('#rllenara').puicheckbox();
			$('#ractualizara').puicheckbox();
			$('#rcerrara').puicheckbox();
$('#crear').puibutton({
    icon: 'fa-plus'
});
$('#crear2').puibutton({
    icon: 'fa-plus'
});
$('#notifytop').puinotify({  
            easing: 'easeInOutCirc'	
           });  
});
    $(function() {  
        $('#tbllocal').puidatatable({  
		    caption: 'Campos Personalizados',  
            paginator: {  
                rows: 10				
            },  
			columns: [  
                {field:'nombre', headerText: 'nombre', sortable:true},  
                {field:'tipo_dato', headerText: 'tipo dato', sortable:true},  
                {field:'valores_posibles', headerText: 'valores posibles', sortable:true},
				{field:'mostrar_llenar', headerText: 'mostrar llenar', sortable:true},
				{field:'mostrar_actualizar', headerText: 'mostrar actualizar', sortable:true},
				{field:'mostrar_cerrar', headerText: 'mostrar cerrar', sortable:true},
				{field:'requerido_llenar', headerText: 'requerido llenar', sortable:true},
				{field:'requerido_actualizar', headerText: 'requerido actualizar', sortable:true},
				{field:'requerido_cerrar', headerText: 'requerido cerrar', sortable:true},
				

				
            ],  
            datasource: [ 
                			
			    <?php
				foreach($campo as $x=>$y)
                  {
                   echo "{'nombre':'".$y['nombre']."','tipo_dato': '".$tipo_campo[$y['tipo_dato']]."', 'valores_posibles':'".$y['valores_posibles']."', 'mostrar_llenar':'".(($y['mostrar_llenar']==0)?'NO':'SI')."', 'mostrar_actualizar':'".(($y['mostrar_actualizar']==0)?'NO':'SI')."', 'mostrar_cerrar':'".(($y['mostrar_cerrar']==0)?'NO':'SI')."', 'requerido_llenar':'".(($y['requerido_llenar']==0)?'NO':'SI')."', 'requerido_actualizar':'".(($y['requerido_actualizar']==0)?'NO':'SI')."', 'requerido_cerrar':'".(($y['requerido_cerrar']==0)?'NO':'SI')."'},"; 
				   
				  }
				?>
                  
            ], 
            selectionMode: 'single',
		  
            /*rowSelect: function(event, data) {  
                $('#messages').puigrowl('show', [{severity:'info', summary: 'Opciones', detail: ('<p><a href="http://localhost/gestor/actualiza_campo_personalizado.php?nombre='+data.nombre+'">Editar Campo Personalizado:'+data.nombre+'</a> </p> ')}]);  
                },  
            rowUnselect: function(event, data) {  
                $('#messages').puigrowl('show', [{severity:'info', summary: 'Row Unselected', detail: (data.Nombres + ' ' + data.Usuario)}]);  
            } */ 
        });  
  
        $('#messages').puigrowl();  
		
		$('#dlg').puidialog({
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
                    $('#dlg').puidialog('hide');
                }
            },
            {
                text: 'Crear',
                icon: 'fa-save',
                click: function() {
				if($('#nombre').val()==""){
						 $('#messages').puigrowl('show', [{severity:'info', summary: 'Alerta', detail: ('<p>Ingrese el campo nombre</p> ')}]);  
               
						return false;
					}
					else{
						var nombre = $('#nombre').val();
					}
					var tipo = $('#tipo').val();
					var posibles = $('#posibles').val();
					
					if($('#mllenar').prop('checked') ){  
                       var mllenar = 1;
   
                    } else {
                      var mllenar = 0;
	
                    }
					
					//var mllenar = $('#mllenar').val();
					if($('#mactualizar').prop('checked') ){  
                       var mactualizar = 1;
   
                    } else {
                      var mactualizar = 0;
	
                    }
					//var mactualizar = $('#mactualizar').val();
					if($('#mcerrar').prop('checked') ){  
                       var mcerrar = 1;
   
                    } else {
                      var mcerrar = 0;
	
                    }
					//var mcerrar = $('#mcerrar').val();
					if($('#rllenar').prop('checked') ){  
                       var rllenar = 1;
   
                    } else {
                      var rllenar = 0;
	
                    }
					//var rllenar = $('#rllenar').val();
					if($('#ractualizar').prop('checked') ){  
                       var ractualizar = 1;
   
                    } else {
                      var ractualizar = 0;
	
                    }
					//var ractualizar = $('#ractualizar').val();
					if($('#rcerrar').prop('checked') ){  
                       var rcerrar = 1;
   
                    } else {
                      var rcerrar = 0;
	
                    }
				
									jQuery.post("registra_campo_personalizado.php", {
						nombre:nombre,
						tipo:tipo,
						posibles:posibles,
						mllenar:mllenar,
						mactualizar:mactualizar,
						mcerrar:mcerrar,
						rllenar:rllenar,
						ractualizar:ractualizar,
						rcerrar:rcerrar
					}, function(data, textStatus){
					  							

						if(data == 1){
							//$('#notifytop').puinotify('show', '<p class="ui-state-default">Datos insertados correctamente.</p>'); 
							$('#messages').puigrowl('show', [{severity:'info', summary: 'Registro campo personalizado', detail: 'Datos insertados correctamente'}]);
							$('#dlg').puidialog('hide');
							$('#tbllocal').puidatatable('reset');
						}
						else
						{
						if(data == 2){
							//$('#notifytop').puinotify('show', '<p class="ui-state-default">Ha ocurrido un error..</p>'); 
							$('#messages').puigrowl('show', [{severity:'warn', summary: 'Registro campo personalizado', detail: 'Ha ocurrido un error..'}]);
						}
						else
						{
						if(data == 3){
							//$('#notifytop').puinotify('show', '<p class="ui-state-default">Campo personalizado: '+nombre+' ya existe</p>');
							$('#messages').puigrowl('show', [{severity:'warn', summary: 'Registro campo personalizado', detail: 'Campo personalizado: '+nombre+' ya existe'}]);
						}
						}
						}
					});

				
                    //$('#dlg').puidialog('hide');
                }
            }
        ]
    });
	/*************cuadro de actualizacion***************/
	
		$('#dlg2').puidialog({
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
                    $('#dlg2').puidialog('hide');
                }
            },
            {
                text: 'Crear',
                icon: 'fa-save',
                click: function() {
				var nombrea = $('#nomb').val();
					var tipoa = $('#tipoa').val();
					var posiblesa = $('#posiblesa').val();
					
					if($('#mllenara').prop('checked') ){  
                       var mllenara = 1;
   
                    } else {
                      var mllenara = 0;
	
                    }
					//var mllenara = $('#mllenara').val();
					if($('#mactualizara').prop('checked') ){  
                       var mactualizara = 1;
   
                    } else {
                      var mactualizara = 0;
	
                    }
					//var mactualizara = $('#mactualizara').val();
					if($('#mcerrara').prop('checked') ){  
                       var mcerrara = 1;
   
                    } else {
                      var mcerrara = 0;
	
                    }
					//var mcerrara = $('#mcerrara').val();
					if($('#rllenara').prop('checked') ){  
                       var rllenara = 1;
   
                    } else {
                      var rllenara = 0;
	
                    }
					//var rllenara = $('#rllenara').val();
					
					if($('#ractualizara').prop('checked') ){  
                       var ractualizara = 1;
   
                    } else {
                      var ractualizara = 0;
	
                    }
					//var ractualizara = $('#ractualizara').val();
					if($('#rcerrara').prop('checked') ){  
                       var rcerrara = 1;
   
                    } else {
                      var rcerrara = 0;
	
                    }
					//var rcerrara = $('#rcerrara').val();
					
					jQuery.post("actualizacion_campo_personalizado.php", {
						nombrea:nombrea,
						tipoa:tipoa,
						posiblesa:posiblesa,
						mllenara:mllenara,
						mactualizara:mactualizara,
						mcerrara:mcerrara,
						rllenara:rllenara,
						ractualizara:ractualizara,
						rcerrara:rcerrara
					}, function(data, textStatus){
						if(data == 1){
							//$('#notifytop').puinotify('show', '<p class="ui-state-default">Datos actualizados correctamente.</p>'); 
							$('#notifytop').puinotify('show', '<center><table class="width50" cellspacing="1"><td class="ui-state-default">Datos actualizados correctamente.</td></table></center>'); 
						    $('#dlg2').puidialog('hide');
							$('#tbllocal').puidatatable('reset');
						}
						else
						{
						if(data == 2){
						    $('#notifytop').puinotify('show', '<p class="ui-state-default">Ha ocurrido un error...!</p>'); 
							
						}
						
						}
						
						
						
					});

				
                  
                }
            }
        ]
    });	
 /*****************fin cuadro de actualizacion************************/
    $('#nuevo').puibutton({
        icon: 'fa-plus',
        click: function() {
            $('#dlg').puidialog('show');
        }
    });
	
	
	$('#editar').puibutton({
        icon: 'fa-edit',
        click: function() {
		    var selections = $('#tbllocal').puidatatable('getSelection');
            if (selections.length === 1) {
						if (selections[0]) {
						     $("input[name='nomb']").val(selections[0].nombre);
							 $("input[name='posiblesa']").val(selections[0].valores_posibles);
							 if(selections[0].mostrar_llenar=='SI')
							 {
							  $('#mllenara').puicheckbox('check');
                             }	
                             if(selections[0].mostrar_actualizar=='SI')
							 {
							  $('#mactualizara').puicheckbox('check');
                             }
                              if(selections[0].mostrar_cerrar=='SI')
							 {
							  $('#mcerrara').puicheckbox('check');
                             }	

                             if(selections[0].requerido_llenar=='SI')
							 {
							  $('#rllenara').puicheckbox('check');
                             }	
                             if(selections[0].requerido_actualizar=='SI')
							 {
							  $('#ractualizara').puicheckbox('check');
                             }
                              if(selections[0].requerido_cerrar=='SI')
							 {
							  $('#rcerrara').puicheckbox('check');
                             }	
                             //$('#tipoa').puidropdown('getSelectedValue');
							 alert(selections[0].tipo_dato);
							 $('#tipoa').puidropdown('selectValue', 20);
                            $('#dlg2').puidialog('show');
						}
					} else {
						$('#messages').puigrowl('show', [{severity:'warn', summary: 'Editar campo personalizado', detail: 'Por favor seleccione un campo personalizado!'}]);
					}
        }
    });
	
	 $('#eliminar').puibutton({
        icon: 'fa-minus',
        click: function() {
		
		var selections = $('#tbllocal').puidatatable('getSelection');
		if (selections.length === 1)
		{
		 $('#dlg3').puidialog('show');
		}
		else
		{
		$('#messages').puigrowl('show', [{severity:'warn', summary: 'Editar campo personalizado', detail: 'Por favor seleccione un campo personalizado!'}]);
		}
           
        }
    });
	
		$('#dlg3').puidialog({
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
                    $('#dlg3').puidialog('hide');
                }
            },
            {
                text: 'Eliminar',
                icon: 'fa-minus',
                click: function() {
				var selections = $('#tbllocal').puidatatable('getSelection');
				var nombre = selections[0].nombre;
					jQuery.post("eliminacion_campo_personalizado.php", {
						nombre:nombre
					}, function(data, textStatus){
						if(data == 1){
						   $('#messages').puigrowl('show', [{severity:'info', summary: 'Eliminar campo personalizado', detail: 'Campo eliminado correctamente'}]);
		                       //$('#tbllocal').puidatatable('unselectRow','row','silent');
							   $('#dlg3').puidialog('hide');
							   $('#tbllocal').puidatatable('reload');
							}
						else
						{
						if(data == 2){
						     $('#messages').puigrowl('show', [{severity:'warn', summary: 'Eliminar campo personalizado', detail: 'Ha ocurrido un error...!'}]);
			
						}
						
						}
						
						
						
					});

				
                  
                }
            }
        ]
    });	
	
	
    });  
	
</script>    
<br />
  
  <form  action="ingreso_campo_personalizado.php" method="POST"  >
 <div><button id="nuevo" type="button">Nuevo</button> <button id="editar" type="button">Editar</button><button id="eliminar" type="button">Eliminar</button>
<div id="dlg" title="Campo Personalizado">
     
  <table class="width50" cellspacing="1" >
   <tr>
    <td class="ui-state-default">Nombre</td>
    <td><input id="nombre" name="nombre" type="text" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Tipo</td>
    <td><select id="tipo" name="tipo"> 
     <?php
     foreach($tipo_campo as $id=>$valor) 
     {
     echo '<option value="' . $id . '"';
     echo '>' . $valor . '</option>';
     }
     ?>     
         	
     </select> </td>
   </tr>
   <tr>
    <td class="ui-state-default">Valores posibles</td>
    <td><input id="posibles" name="posibles" type="text" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al llenar</td>
    <td><input id="mllenar" name="mllenar" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al actualizar</td>
    <td><input id="mactualizar" name="mactualizar" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al cerrar</td>
    <td><input id="mcerrar" name="mcerrar" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al llenar</td>
    <td><input id="rllenar" name="rllenar" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al actualizar</td>
    <td><input id="ractualizar" name="ractualizar" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al cerrar</td>
    <td><input id="rcerrar" name="rcerrar" type="checkbox" /></td>
   </tr>
   
<tr>
</tr>
</table>
 
</div>
<div id="dlg2" title="Campo Personalizado">
  <table class="width75" cellspacing="1" >
   <tr>
    <td class="ui-state-default">Nombre</td>
   <td><input id="nomb" name="nomb" type="text" disabled/></td>
   </tr>  
   <tr>
    <td class="ui-state-default">Tipo</td>
    <td><select id="tipoa" name="tipoa"> 
     <?php
     foreach($tipo_campo as $id=>$valor) 
     {
     echo '<option value="' . $id . '"';
     echo '>' . $valor . '</option>';
     }
     ?>     
         	
     </select> </td>
   </tr>
   <tr>
    <td class="ui-state-default">Valores posibles</td>
    <td><input id="posiblesa" name="posiblesa" type="text" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al llenar</td>
	<td><input id="mllenara" name="mllenara" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al actualizar</td>
	
	
	<td><input id="mactualizara" name="mactualizara" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al cerrar</td>
	<td><input id="mcerrara" name="mcerrara" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al llenar</td>
	<td><input id="rllenara" name="rllenara" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al actualizar</td>
	<td><input id="ractualizara" name="ractualizara" type="checkbox" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al cerrar</td>
	<td><input id="rcerrara" name="rcerrara" type="checkbox" /></td>
   </tr>
   

</table>
</div>

<!-- Remove confirmation dialog -->
		<div id="dlg3" title="Emininar campo personalizado">
			<p>Esta seguro de eliminar campo personalizado</p>
			
		</div>
 </div>
 
 </form>
 <div id="tbllocal"></div>
<div id="notifytop"></div> 
 <div id="messages"></div> 
  

</html>
