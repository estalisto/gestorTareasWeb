<?php
include "conexion/conexion.php";
		$cnn = new conexion();
		$con = $cnn->conectar();
		mysqli_select_db($con,"gestor");
		//tareas asiganas
		$sql = "SELECT t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t WHERE t.id_tema=p.ID_TEMA AND t.estado='A' AND p.estado='20' GROUP BY t.NOMBRE";    
		//$consulta = mysqli_query($con,$sql);  
		//echo "1,2,3,4";
		//while ($fila = mysqli_fetch_array($consulta)) {
	//		 echo "[".$fila['tema']."],[".$fila['cant']."]," ;
	//	}
	?>