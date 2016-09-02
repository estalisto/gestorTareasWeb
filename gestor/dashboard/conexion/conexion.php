<?php

class conexion{
	function conectar(){
		return mysqli_connect("localhost","root","admin12345");
	}
}/*
$cnn = new	conexion();
if ($cnn-> conectar()){
	echo "Conectado";
}else{
	echo "No Conectado";
}*/
?>
