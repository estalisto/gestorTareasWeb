<?php
require_once( 'menu.php' );
require_once( 'configuraciones.php' );
//print_r($niveles_acceso);

?>
<html>
 

<script type="text/javascript">  
        $(function() {  
            $('#usuario').puiinputtext();
            $('#nombres').puiinputtext();
            $('#apellidos').puiinputtext();	
            $('#email').puiinputtext();
            $('#celular').puiinputtext();			
            $('#contrasena').puiinputtext();
			$('#verifica').puiinputtext();
			$('#acceso').puidropdown();  
            $('#crear').puibutton();  	
          }); 
        $('document').ready(function(){
				$('#crear').click(function(){
					if($('#usuario').val()==""){
						alert("Ingrese el nombre de usuario");
						//$('#messages').puigrowl('show', [{severity:'info', summary: 'Alerta', detail: ('Ingrese el nombre del Usuario')}]);
						return false;
					}
					else{
						var usuario = $('#usuario').val();
					}
					if($('#nombres').val()==""){
						alert("Ingrese los nombres");
						return false;
					}
					else{
						var nombres = $('#nombres').val();
					}
					if($('#apellidos').val()==""){
						alert("Ingrese los apellidos");
						return false;
					}
					else{
						var apellidos = $('#apellidos').val();
					}
					if($('#email').val()==""){
						alert("Ingrese correo");
						return false;
					}
					else{
						var email = $('#email').val();
					}
					
					if($('#celular').val()==""){
						alert("Ingrese el telefono");
						return false;
					}
					else{
						var celular = $('#celular').val();
					}
                    if($('#acceso').val()==""){
						alert("Ingrese el nivel de acceso");
						return false;
					}
					else{
						var acceso = $('#acceso').val();
					}
					jQuery.post("registra_usuarios.php", {
						usuario:usuario,
						nombres:nombres,
						apellidos:apellidos,
						email:email,
						celular:celular,
						acceso:acceso,
						//contrasena:contrasena,
						//verifica:verifica
					}, function(data, textStatus){
						if(data == 1){
							$('#res').html("Datos insertados correctamente.");
							$('#res').css('color','green');
						}
						else
						{
						if(data == 2){
							$('#res').html("Ha ocurrido un error.");
							$('#res').css('color','red');
						}
						else
						{
						if(data == 3){
							$('#res').html("Usuario "+usuario+ " ya existe.");
							$('#res').css('color','red');
						}
						}
						}
					});
				});
			});
   		
</script>   
<br />
<div align="center">
 <form  action="registra_usuarios.php" method="POST"  >
 <!--<form> -->
  <table class="width50" cellspacing="1" >
   <tr>
    <td>Usuario</td>
    <td><input id="usuario" name="usuario" type="text" /></td>
   </tr>
   <tr>
    <td>Nombres</td>
    <td><input id="nombres" name="nombres" type="text" /></td>
   </tr>
   <tr>
    <td>Apellidos</td>
    <td><input id="apellidos" name="apellidos" type="text" /></td>
   </tr>
   <tr>
    <td>Correo Electrónico</td>
    <td><input id="email" name="email" type="text" /></td>
   </tr>
   <tr>
    <td>Celular</td>
    <td><input id="celular" name="celular" type="text" /></td>
   </tr>
   <tr>
    <td>Nivel de Acceso</td>
    <td><select id="acceso" name="acceso"> 
<?php
foreach($niveles_acceso as $id=>$valor) 
{
echo '<option value="' . $id . '"';
echo '>' . $valor . '</option>';
}
?>     
    	
</select> </td>
</tr>
<tr>
<td class="center" colspan="2"><input id="crear"  type="button"  value="Crear Usuario" /></td>
</tr>
</table>
</form> 
<span id="res"></span>
</div>
</html>
