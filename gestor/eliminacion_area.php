<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 
 $nombre= $_POST [ "nombre" ];
 
   
   $sql="update gestor_areas
    set 
	estado='I'
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