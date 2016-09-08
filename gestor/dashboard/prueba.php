<?php
include "conexion/conexion.php";
		$cnn = new conexion();
		$con = $cnn->conectar();
		mysqli_select_db($con,"gestor");
		//tareas asiganas
	/*	$sql1="SELECT DISTINCT(mes) FROM (
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='01'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='02'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='03'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='04'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='05'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='06'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION

SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='07'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='08'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='09'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='10'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='11'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='12'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE) a";
$consulta1 = mysqli_query($con,$sql1);  
	while ($fila1 = mysqli_fetch_array($consulta1)) {

		$sql = "
SELECT * FROM (
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='01'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='02'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='03'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='04'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='05'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='06'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION

SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='07'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='08'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='09'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='10'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='11'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='12'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE) a
WHERE mes='".$fila1['mes']."'";  

		$consulta = mysqli_query($con,$sql);  
		//echo "1,2,3,4";
		echo "[";
		while ($fila = mysqli_fetch_array($consulta)) {
		 echo $fila['cant']."," ;
		 //[ [ 3, 7],[6]];

		}

echo "],";
		 

		}
*/

$sqlmeses="SELECT CASE 
WHEN mes='01' THEN 'Enero'
WHEN mes='02' THEN 'Febrero'
WHEN mes='03' THEN 'Marzo'
WHEN mes='04' THEN 'Abril'
WHEN mes='05' THEN 'Mayo'
WHEN mes='06' THEN 'Junio'
WHEN mes='07' THEN 'Julio'
WHEN mes='08' THEN 'Agosto'
WHEN mes='09' THEN 'Septiembre'
WHEN mes='10' THEN 'Octubre'
WHEN mes='11' THEN 'Noviembre'
WHEN mes='12' THEN 'diciembre' END mes


 FROM (
SELECT DISTINCT(mes) 
FROM (
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='01'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='02'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='03'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='04'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='05'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='06'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION

SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='07'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='08'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='09'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='10'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='11'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='12'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE) a) b ";
		



 $consulta = mysqli_query($con,$sqlmeses);
 while ($fila = mysqli_fetch_array($consulta)) {

              echo "'".$fila["mes"]."',";

	
              }

$sqlTemas="
SELECT * FROM (
SELECT DISTINCT(tema) tema FROM (
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='01'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='02'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='03'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='04'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='05'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='06'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION

SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='07'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='08'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='09'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='10'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='11'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE
UNION ALL 
SELECT  DATE_FORMAT(p.FECHA_COMPROMISO,'%m') mes, t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t
WHERE  t.id_tema=p.ID_TEMA
 AND DATE_FORMAT(p.FECHA_COMPROMISO,'%m')='12'
AND t.estado='A'
AND p.ESTADO NOT IN (30,40)
GROUP BY t.NOMBRE) a
WHERE mes=08)b";

 $consulta = mysqli_query($con,$sqlTemas);
 while ($fila = mysqli_fetch_array($consulta)) {

              echo "'".$fila["tema"]."',";

	
              }

	?>