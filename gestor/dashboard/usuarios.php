<?php
require_once( 'menu2.php' );
require_once( 'configuraciones.php' );

$rs = $DB->Execute("select usuario ,nombres,apellidos,nivel_acceso from gestor_usuario");

//recorro arreglo
foreach ($rs as $x=>$dato) {
     $usuario[]=$dato; 
}

?>
<html>
 

<script type="text/javascript">  
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
</script>    
<br />
  
  <form  action="ingreso_usuarios.php" method="POST"  >
 <div><input id="crear"  type="submit"  value="Crear Usuario" /></div>
 </form>
 <div id="tbllocal"></div> 
 <div id="messages"></div> 
  

</html>
