<?php
include "../dashboard/conexion/conexion.php";
class usuariosDatos{
	  function validar($usuario,$pass){
        $cnn = new conexion();
		    $con = $cnn->conectar();
		    mysqli_select_db($con,"gestor");

		$sql = "SELECT u.usuario, u.clave FROM gestor_usuario u WHERE u.usuario='".$usuario."' AND u.clave=md5('".$pass."')";
      $consulta = mysqli_query($con,$sql);
        $fila = mysqli_fetch_array($consulta);
        if($fila>0){
            if($fila["usuario"] == $usuario){

                return true;
            }
        }else{
            return false;
        }
    }
}

$obj=new usuariosDatos();

if($obj->validar($_POST["usuario"],$_POST["password"])){
    session_start();
    $_SESSION["usuario"] = $_POST["usuario"];
    $_SESSION["password"] = $_POST["password"];
    echo "1";
}else{
    echo "2";
}


?>
