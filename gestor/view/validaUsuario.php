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

      
        if($fila["usuario"] === $usuario){

             return true;

        }else{
            return false;
        }
    }
}

$obj=new usuariosDatos();
$usuario=$_POSt['usuario'];
$password=$_POSt['password'];

if($obj->validar($usuario,$password)){
    session_start();
    $_SESSION["usuario"] = $_GET["usuario"];
    $_SESSION["pass"] = $_GET["pass"];
    echo "1";
}else{
    
    echo "2";
}



?>