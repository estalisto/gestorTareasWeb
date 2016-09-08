<?php

include "conexion/conexion.php";
echo "ok";


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>jqPlot Charts - Pie</title>
<meta name="description" content="Resource from http://CoursesWeb.net/ , web programming, development courses" />
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.pieRenderer.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="lib/plugins/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" href="lib/jquery.jqplot.min.css" />
</head>
<body>
<div id="chart2" style="width:700px;height:300px;"></div>
<script>
$(document).ready(function() {
 // var chart_data = [ [2, 6, 7, 10]];

var chart_data = [[
<?php
		$cnn = new conexion();
		$con = $cnn->conectar();
		mysqli_select_db($con,"gestor");
		
		$sql = "SELECT (SELECT COUNT(*)  FROM gestor_principal p WHERE p.ID_EJECUTOR =u.id_usuario) tareas FROM gestor_usuario u ORDER BY u.id_usuario";    
		$consulta = mysqli_query($con,$sql);  
		//echo "1,2,3,4";
		while ($fila = mysqli_fetch_array($consulta)) {
			?>
			<?php echo $fila['tareas'].",";?>
		<?php
		}
		
?> ]];




  var ticks = [
  <?php
  $sql = "SELECT u.usuario FROM gestor_usuario u ORDER BY u.id_usuario";
	        $consulta = mysqli_query($con,$sql);
	        
	        while ($fila = mysqli_fetch_array($consulta)) {
              ?>
              '<?php  echo $fila["usuario"] ?>',

			<?php
              }
			?>

			];
  var labels = ['MarPlo.net', 'CoursesWeb.net'];
  var chart_opt = {
    title:'Tareas Asignadas',
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
</script>
</body>
</html>