<?php
require_once( 'menu.php' );
require_once( 'configuraciones.php' );

$nom= $_GET [ "nombre" ];

$rs = $DB->Execute("select nombre, tipo_dato,
                    valores_posibles,mostrar_llenar,mostrar_actualizar,mostrar_cerrar,
					requerido_llenar,requerido_actualizar,requerido_cerrar from gestor_campo_personalizado where nombre='$nom'");

//recorro arreglo
foreach ($rs as $x=>$dato) {
     $campo[]=$dato; 
}


$mostrar_llenar=$campo[0]['mostrar_llenar'];
$mostrar_actualizar=$campo[0]['mostrar_actualizar'];
$mostrar_cerrar=$campo[0]['mostrar_cerrar'];
$requerido_llenar=$campo[0]['requerido_llenar'];
$requerido_actualizar=$campo[0]['requerido_actualizar'];
$requerido_cerrar=$campo[0]['requerido_cerrar'];
?>
<html>
 

<script type="text/javascript">  
        $(function() {
            $('#actualizar').puibutton();
             $('#notifytop').puinotify({  
            easing: 'easeInOutCirc',
            position: 'bottom'			
           }); 		
           $('#messages').puigrowl(); 	
            $('#nomb').puiinputtext();		   
		    $('#nombrea').puiinputtext();
            $('#tipoa').puiinputtext();
            $('#posiblesa').puiinputtext();	
            $('#mllenara').puiinputtext();
            $('#mactualizara').puiinputtext();			
            $('#mcerrara').puiinputtext();
			$('#rllenara').puiinputtext();
			$('#ractualizara').puiinputtext();
			$('#rcerrara').puiinputtext();
			    	
          }); 
        $('document').ready(function(){
				$('#actualizar').click(function(){
					
					var nombrea = $('#nombrea').val();
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
						}
						else
						{
						if(data == 2){
						    $('#notifytop').puinotify('show', '<p class="ui-state-default">Ha ocurrido un error...!</p>'); 
							
						}
						
						}
						
						
						
					});
				});
			});
   		
</script>   
<br />
<div align="center">
 <form  action="actualizacion_campo_personalizado.php" method="POST"  >
 <!--<form> -->
  <table class="width50" cellspacing="1" >
   <tr>
    <td class="ui-state-default">Nombre</td>
    <td id="nomb" name="nomb"><?php echo $campo[0]['nombre'];?></td>
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
    <td><input id="posiblesa" name="posiblesa" type="text" value="<?php echo $campo[0]['valores_posibles'];?>" /></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al llenar</td>
	<?php
	$check=(($mostrar_llenar==0)?"":"checked");
	?>
	<td><input id="mllenara" name="mllenara" type="checkbox" <?php echo $check; ?>/></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al actualizar</td>
	<?php
	$check=(($mostrar_actualizar==0)?"":"checked");
	?>
	
	<td><input id="mactualizara" name="mactualizara" type="checkbox" <?php echo $check; ?>/></td>
   </tr>
   <tr>
    <td class="ui-state-default">Mostrar al cerrar</td>
	<?php
	$check=(($mostrar_cerrar==0)?"":"checked");
	?>
	<td><input id="mcerrara" name="mcerrara" type="checkbox" <?php echo $check; ?>/></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al llenar</td>
	<?php
	$check=(($requerido_llenar==0)?"":"checked");
	?>
	<td><input id="rllenara" name="rllenara" type="checkbox" <?php echo $check; ?>/></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al actualizar</td>
	<?php
	$check=(($requerido_actualizar==0)?"":"checked");
	?>
	<td><input id="ractualizara" name="ractualizara" type="checkbox" <?php echo $check; ?>/></td>
   </tr>
   <tr>
    <td class="ui-state-default">Requerido al cerrar</td>
	<?php
	$check=(($requerido_cerrar==0)?"":"checked");
	?>
	<td><input id="rcerrara" name="rcerrara" type="checkbox" <?php echo $check; ?>/></td>
   </tr>
   
<tr>
<td class="center" colspan="2"><input id="actualizar"  type="button"  value="Actualizar Campo Personalizado" /></td>
</tr>
</table>
<input type="hidden" value="<?php echo $campo[0]['nombre'];?>" name="nombrea" id="nombrea"/>
</form> 
<div id="notifytop"></div> 
<span id="res"></span>
<div id="messages"></div> 
</div>
</html>
