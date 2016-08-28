<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 
 $nombre= $_POST [ "nombre" ];
 $tipo= $_POST [ "tipo" ];
 $posibles= $_POST [ "posibles" ];
 
 

$mllenar=$_POST['mllenar'];
$mactualizar=$_POST['mactualizar'];
 
$mcerrar=$_POST['mcerrar'];

$rllenar=$_POST['rllenar'];
 
$ractualizar=$_POST['ractualizar'];

$rcerrar=$_POST['rcerrar'];

 $sql="insert into gestor_campo_personalizado
  (NOMBRE,
   TIPO_DATO,
   VALORES_POSIBLES,
   MOSTRAR_LLENAR,
   MOSTRAR_ACTUALIZAR,
   MOSTRAR_CERRAR,
   REQUERIDO_LLENAR,
   REQUERIDO_ACTUALIZAR,
   REQUERIDO_CERRAR,
   FECHA_CREACION,
   ESTADO)
values
  ('$nombre',
   $tipo,
   '$posibles',
   $mllenar,
   $mactualizar,
   $mcerrar,
   $rllenar,
   $ractualizar,
   $rcerrar,
   UNIX_TIMESTAMP(now()),
   'A')";  
 
	$rs = $DB->Execute("select nombre from gestor_campo_personalizado where nombre= '$nombre'");
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