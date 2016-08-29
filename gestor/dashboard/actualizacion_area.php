<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 
 $nombre= $_POST [ "nombre" ];
 $descripcion= $_POST [ "descripcion" ];
 
   
   $sql="update gestor_areas
    set 
	descripcion='$descripcion',
	fecha_actualizacion=UNIX_TIMESTAMP(now()),
	usuario_actualizacion=USER()
   where nombre='$nombre'";
 


	
if (! ($DB-> Execute ($sql))) {
	 echo"2";
	 //echo $DB->ErrorMsg();
	 
 }
 else
 {
 echo "1";
 
 }
?>