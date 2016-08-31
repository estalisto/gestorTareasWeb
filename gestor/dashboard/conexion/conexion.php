<?php

class conexion{
	function conectar(){
		return mysqli_connect("localhost","root","sebas2008");


	}
}/*
$cnn = new	conexion();
if ($cnn-> conectar()){
	echo "Conectado";
}else{
	echo "No Conectado";
}*/
?>
