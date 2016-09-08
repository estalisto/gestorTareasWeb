var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : [
			<?php
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
					label: "Tareas Asignadas",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [
					<?php
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
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}