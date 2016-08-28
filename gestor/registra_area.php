<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 
 $nombre= $_POST [ "nombre" ];
 $descripcion= $_POST [ "descripcion" ];
 

 



 $sql="insert into gestor_areas
  (NOMBRE,
   DESCRIPCION,
   FECHA_CREACION,
   USUARIO_CREACION,
   ESTADO)
values
  ('$nombre',
   '$descripcion',
   UNIX_TIMESTAMP(now()),
   USER(),
   'A')";  
 
	$rs = $DB->Execute("select nombre from gestor_areas where nombre= '$nombre'");
	$cont=0;

foreach ($rs as $x=>$dato) {
    $cont+=1; 
}
	
if($cont>0)
{
echo "3";
}

else
{		   
 if (! ($DB-> Execute ($sql))) {
	 echo"2";
	 //echo $DB->ErrorMsg();
	 
 }
 else
 {
 echo "1";
 }
}
?>