<?php
//require_once( '/chartJS/samples/line.php' );
include "conexion/conexion.php";
session_start();
if(isset($_SESSION["usuario"]) && isset($_SESSION["password"])){

	 echo "";
}else{
	header('Location: ../');
}
 ?>
<!doctype html>
<html>
	<head>
    <meta charset="UTF-8">
		<title>Gestor 2016</title>
		<!--<script src="chartJS/Chart.js"></script>-->
<meta name="description" content="Resource from http://CoursesWeb.net/ , web programming, development courses" />
<!--<script type="text/javascript" src="lib/jquery.min.js"></script>-->

<link rel="stylesheet" type="text/css" href="lib/jquery.jqplot.min.css" />


<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.11.1/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/themes/Redmond/theme.css" />
 <link rel="stylesheet" type="text/css" href="librerias/font-awesome-4.6.3/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/primeui.min.css" />
<script type="text/javascript" src="librerias/jquery-1.11.1/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="librerias/jquery-ui-1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="librerias/primeui-4.1.12/primeui.min.js"></script>

<script type="text/javascript" src="lib/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.pieRenderer.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.pointLabels.js"></script>

	<script src="js/js.js"></script>

	</head>
	<body>

<div class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row">
        <div class="ui-grid-col-12">
			      <ul id="mb1">
			  		<li> <a data-icon="fa-home" href="/gestor/dashboard/"  >Incio</a>
			  		</li>
			    	<li> <a >Solicitud</a>
			        <ul>
			            <li><a data-icon="fa-pencil" href="/gestor/dashboard/pages/solicitudes/frm_gestor_ingreso3.php" >Nueva Solicitud</a>

			            </li>
			            <li><a data-icon="fa-search"  href="/gestor/dashboard/pages/solicitudes/frm_consultaSolicitudes2.php" >Ver Solicitudes</a></li>

			        </ul>
			    </li>
			   <!-- <li> <a data-icon="fa-contact">Reportes2</a>

			    </li> -->
			    <li>
			        <a data-icon="fa-gear">Administración</a>
			        <ul>
			            <li ><a data-icon="fa-pencil" href="usuarios2.php">Usuarios</a></li>
			            <li><a data-icon="fa-pencil" href="areas2.php">Areas</a></li>
			            <li><a data-icon="fa-pencil" href="/gestor/dashboard/campos_personalizados.php">Campos Personalizados </a></li>
			      <li><a data-icon="fa-pencil" href="">Temas</a></li>
			        </ul>

			    </li>

			  
			    <li> <a>  Áreas</a>
					  <!-- <select id="areasID" name="basic" onchange="changeEventHandler(event);" > -->
   					   <select id="areasID" name="basic" onchange="carga_grafico();" >

						   
					   	<option value="0">Seleccione una área</option>
					   <?php
					    $cnn = new conexion();
						$con = $cnn->conectar();
						mysqli_select_db($con,"gestor");
						$sql = "SELECT a.ID_AREA, a.NOMBRE FROM gestor_areas a WHERE a.ESTADO='A'";    
				        $consulta = mysqli_query($con,$sql);  
				        
				        while ($fila = mysqli_fetch_array($consulta)) {
			              ?>
                             <option value=<?php  echo $fila["ID_AREA"]?> ><?php  echo $fila["NOMBRE"] ?></option>";
             			<?php
              			}
			                     //  echo " <option value='0'>ok</option>";
				
						?>
                   <!-- <option value="0">Seleccione una área</option>
                    <option value="1">Fabrica de Software</option>
                    <option value="2">Facturacion Electronica</option>
                    <option value="3">BI</option>
                    <option value="4">Administracion</option> -->
                    </select>

			  		</li>
			  		  <li id="destroySesionID">
			        <a data-icon="fa-close" href="/gestor/dashboard/pages/cerrarSesion.php"  >Cerrar Sesion</a>
			    </li>
			</ul>

        </div>
    </div>
</div>
 <br> <!-- Menu Vertical-->
		<h3></h3>
<div class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row">
        <div class="ui-grid-col-4">
		
				<ul id="tm2">
					<li> 
					  <input id="usernamer" type="text" />
					   <button id="buscar" type="button">Buscar</button>
				    </li>
				    <li> <a data-icon="fa-align-justify">Estadísticas</a>
				        <ul> 
				            <li><a  href="#" onclick="grafica1();" >Tareas Asignadas</a></li> 
				            <li><a>Tareas Realizadas</a></li> 
				        </ul>
				    </li>
				    <!--<li> <a data-icon="fa-edit">Edit</a>
				    
				        <ul>
				            <li><a data-icon="fa-mail-forward">Undo</a></li>
				            <li><a data-icon="fa-mail-reply">Redo</a></li>
				        </ul>
				    </li>-->

				    <li>
				        <a data-icon="fa-gears">Configuraciones</a>

				    </li>
				    <li>
			            <a data-icon="fa-close" href="/gestor/dashboard/pages/cerrarSesion.php"  >Cerrar Sesion</a>
				    </li>
				     <li>
				        <a data-icon="fa-question">Ayuda</a>			 
				    </li>
				</ul>


        </div>
        	<div style="width:50%">
			
			<dir id="diagramLine">
	

			</dir>
  			<div class="ui-grid ui-grid-responsive">
          		<div class="ui-grid-row">
          			<fieldset id="graficosOPE">
          			<legend>Dashboard operacional</legend>
				        <div id="chart2" class="ui-grid-col-4" style="width:300px;height:400px;"></div>
				        <div id="chart3" class="ui-grid-col-4" style="width:300px;height:400px;"></div>
				        <div id="chart4" class="ui-grid-col-4" style="width:300px;height:400px;"></div>
			       </fieldset>
			    </div>
			</div>

			<!--<div id="chart2" style="width:200px;height:200px;"></div>
			<div id="chart3" style="width:200px;height:200px;"></div>-->
			
		</div>

    </div>
</div>






		


	<script>
		
$(document).ready(function() {
var chart_data = [<?php
 //[1,2],[3,5],[3,7]
		$cnn = new conexion();
		$con = $cnn->conectar();
		mysqli_select_db($con,"gestor");
		//tareas asiganas
		$sql1="SELECT DISTINCT(mes) FROM (
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

		

	?>];


  var ticks = [
  <?php
  //['Agosto','Septiembre']
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

	
              }?>
			];
			var labels = [
<?php
//['Capacitacion','Soporte']
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

			];
  
  var chart_opt = {
    title:'Tareas Vencidas',
    seriesDefaults:{
      renderer:$.jqplot.BarRenderer,
      pointLabels: { show: true }
    },
    axes: {
      xaxis: {
        renderer: $.jqplot.CategoryAxisRenderer,
        ticks: ticks
      }
    },
    legend: {
      show: true,
      placement: 'outsideGrid',
      labels: labels,
      location: 's'
    },
  };

$('#chart2').bind('jqplotDataHighlight',
  function (ev, seriesIndex, pointIndex, data) {
    $('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
  }
);
   
$('#chart2').bind('jqplotDataUnhighlight',
  function (ev) {
    $('#info2').html('Nothing');
  });
  $.jqplot('chart2', chart_data, chart_opt);
});
	//$('#areasID').puidropdown();


	//$('#areasID').click(function(){
//		alert("Cambio");
//	});
//Barras de Colores 
$(document).ready(function(){
    var line1 = 
    [
    <?php
    

		$cnn = new conexion();
		$con = $cnn->conectar();
		mysqli_select_db($con,"gestor");
		//tareas asiganas
		$sql = "SELECT t.NOMBRE tema, COUNT(*) cant  FROM gestor_principal p, gestor_temas t WHERE t.id_tema=p.ID_TEMA AND t.estado='A' AND p.estado='20' GROUP BY t.NOMBRE";  

		$consulta = mysqli_query($con,$sql);  
		//echo "1,2,3,4";
		while ($fila = mysqli_fetch_array($consulta)) { 
		 echo "['".$fila['tema']."',".$fila['cant']."]," ;
 }
	?>
    ];
 
    $('#chart3').jqplot([line1], {
        title:'Tareas Asignados',
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {
                // Set the varyBarColor option to true to use different colors for each bar.
                // The default series colors are used.
                varyBarColor: true
            }
        },
        axes:{
            xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
});

function changeEventHandler(event) {
  alert('You like ' + event.target.value + ' ice cream.');
  jQuery("#diagramLiner").load("graficabar.php",{},function(){ });

}


$('#pm').puipanelmenu();
 $('#usernamer').puiinputtext();
  $('#graficosOPE').puifieldset();
    $('#buscar').puibutton({
       icon: 'fa-search'
   });
    $('#mb1').puimenubar({
            autoDisplay: true
        });


    $('#tm2').puitieredmenu({
    autoDisplay: false
});
/***********/
$(window).bind("load", function() { 
       
       var footerHeight = 0,
           footerTop = 0,
           $footer = $("#footer");
           
       positionFooter();
       
       function positionFooter() {
       
                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
       
               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "absolute"
                   }).animate({
                        top: footerTop
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }
               
       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)
               
});

	</script>
	</body>
	 <!-- footer start-->
	 	
<div id="footer"	>
   <h4 > Tesistas: Yessica Guachamin -  Bolivar Salazar  @Universidad De Guayaquil Carrera de Ingeniería en Sistemas </h4>
			      
</div>
            <!-- footer end-->
</html>
