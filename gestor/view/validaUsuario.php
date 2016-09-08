<?php

include "../dashboard/conexion/conexion.php";


class usuariosDatos{

    function validar($usuario,$pass){
        $cnn = new conexion();
		$con = $cnn->conectar();


		mysqli_select_db($con,"gestor");

		$sql = "SELECT u.usuario, u.clave FROM gestor_usuario u WHERE u.usuario='".$usuario."' AND u.clave= MD5('".$pass."')";
        $consulta = mysqli_query($con,$sql);
        $fila = mysqli_fetch_array($consulta);
//echo $sql;
      
        if($fila["usuario"] === $usuario){
                session_start();
                $_SESSION["usuario"] = $fila["usuario"];
                $_SESSION["password"] = $fila["clave"];

             return true;

        }else{
            return false;
        }
    }
}

$obj=new usuariosDatos();
$usuario=$_POST['usuario1'];
$password=$_POST['password1'];

if($obj->validar($usuario,$password)){

    echo "true";
}else{
    
    echo "false";
}



?>