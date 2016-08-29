<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 
$usuario= $_POST [ "usuario" ];
 $nombres= $_POST [ "nombres" ];
 $apellidos= $_POST [ "apellidos" ];
 $email= $_POST [ "email" ];
 $celular= $_POST [ "celular" ];
 $acceso= $_POST [ "acceso" ];
 $contrasena= random_password();
   
 $sql="insert into gestor_usuario
        (usuario,
		 nombres,
		 apellidos,
		 email,
		 clave,
		 telefono,
		 nivel_acceso,
		 fecha_creacion)
         values 
		 ('$usuario',
		  '$nombres',
		  '$apellidos', 
		  '$email' ,
		  '$contrasena',
		  '$celular',
		  $acceso,
		  UNIX_TIMESTAMP(now())	 
		   )";
	$rs = $DB->Execute("select usuario from gestor_usuario where usuario= '$usuario'");
	$cont=0;
//recorro arreglo
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