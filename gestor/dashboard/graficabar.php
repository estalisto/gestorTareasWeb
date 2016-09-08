<?php 
require_once('conexion/conexion.php');
?>
<!doctype html>
<html>
	<head>
		<title>Bar Chart</title>
		<script src="chartJS/Chart.js"></script>
	</head>
	<body>
		<div style="width: 50%">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>


	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : [<?php
	 		$cnn = new conexion();
			$con = $cnn->conectar();
			mysqli_select_db($con,"gestor");

			$sql = "SELECT u.usuario FROM gestor_usuario u ORDER BY u.id_usuario";
	        $consulta = mysqli_query($con,$sql);
	        
	        while ($fila = mysqli_fetch_array($consulta)) {
              ?>
              '<?php  echo $fila["usuario"] ?>',

			<?php
              }
			?>
],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data :
				[<?php
					$sql = "SELECT (SELECT COUNT(*) FROM gestor_principal p WHERE p.ID_EJECUTOR =u.id_usuario) tareas FROM gestor_usuario u ORDER BY u.id_usuario";    
			        $consulta = mysqli_query($con,$sql);  
			        
			        while ($fila = mysqli_fetch_array($consulta)) {
		              ?>
		              '<?php  echo $fila["tareas"] ?>',

					<?php
		              }
					?>
				]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	</body>
</html>
