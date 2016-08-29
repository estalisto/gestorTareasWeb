<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 
 $nombre= $_POST [ "nombrea" ];
 $tipo= $_POST [ "tipoa" ];
 $posibles= $_POST [ "posiblesa" ];
 
 $mllenar=$_POST['mllenara'];
 $mactualizar=$_POST['mactualizara'];
 $mcerrar=$_POST['mcerrara'];
 $rllenar=$_POST['rllenara'];
 $ractualizar=$_POST['ractualizara'];
 $rcerrar=$_POST['rcerrara'];
   
   $sql="update gestor_campo_personalizado
    set 
	TIPO_DATO=$tipo,
   VALORES_POSIBLES='$posibles',
   MOSTRAR_LLENAR=$mllenar,
   MOSTRAR_ACTUALIZAR=$mactualizar,
   MOSTRAR_CERRAR=$mcerrar,
   REQUERIDO_LLENAR=$rllenar,
   REQUERIDO_ACTUALIZAR=$ractualizar,
   REQUERIDO_CERRAR=$rcerrar
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