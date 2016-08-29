<?php
require_once( 'menu.php' );
require_once( 'configuraciones.php' );
//print_r($niveles_acceso);

?>
<html>
 

<script type="text/javascript">  
        $(function() {
            $('#crear').puibutton();
             $('#notifytop').puinotify({  
            easing: 'easeInOutCirc',
            position: 'bottom'			
           }); 		
           $('#messages').puigrowl(); 		   
		    $('#nombre').puiinputtext();
            $('#tipo').puiinputtext();
            $('#posibles').puiinputtext();	
            $('#mllenar').puiinputtext();
            $('#mactualizar').puiinputtext();			
            $('#mcerrar').puiinputtext();
			$('#rllenar').puiinputtext();
			$('#ractualizar').puiinputtext();
			$('#rcerrar').puiinputtext();
			    	
          }); 
        $('document').ready(function(){
				$('#crear').click(function(){
					if($('#nombre').val()==""){
						//alert("Ingrese el nombre del campo");alerta
						//$('#notifytop').puinotify('show', '<p class="ui-state-default">Ingrese el campo nombre</p>');  
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
					//var rcerrar = $('#rcerrar').val();
					
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
							$('#notifytop').puinotify('show', '<p class="ui-state-default">Datos insertados correctamente.</p>'); 
						}
						else
						{
						if(data == 2){
							$('#notifytop').puinotify('show', '<p class="ui-state-default">Ha ocurrido un error..</p>'); 
						}
						else
						{
						if(data == 3){
							$('#notifytop').puinotify('show', '<p class="ui-state-default">Campo personalizado: '+nombre+' ya existe</p>');
						}
						}
						}
					});
				});
			});
   		
</script>   
<br />
<div align="center">
 <form  action="registra_campo_personalizado.php" method="POST"  >
 <!--<form> -->
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
<td class="center" colspan="2"><input id="crear"  type="button"  value="Crear Campo Personalizado" /></td>
</tr>
</table>
</form> 
<div id="notifytop"></div> 
<span id="res"></span>
<div id="messages"></div> 
</div>
</html>
