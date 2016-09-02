<?php
//require_once( '/chartJS/samples/line.php' );
include "conexion/conexion.php";

 ?>
<!doctype html>
<html>
	<head>
    <meta charset="UTF-8">
		<title>Gestor 2016</title>
		<script src="chartJS/Chart.js"></script>
		<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.11.1/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/themes/Redmond/theme.css" />
 <link rel="stylesheet" type="text/css" href="librerias/font-awesome-4.6.3/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/primeui.min.css" />
<script type="text/javascript" src="librerias/jquery-1.11.1/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="librerias/jquery-ui-1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="librerias/primeui-4.1.12/primeui.min.js"></script>


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
			            <li ><a data-icon="fa-pencil" href="/gestor/dashboard/usuarios.php">Usuarios</a></li>
			            <li><a data-icon="fa-pencil" href="/gestor/dashboard/areas.php">Areas</a></li>
			            <li><a data-icon="fa-pencil" href="/gestor/dashboard/campos_personalizados.php">Campos Personalizados </a></li>
			      <li><a data-icon="fa-pencil" href="">Temas</a></li>
			        </ul>

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
				            <li><a>Tareas Asignadas</a></li> 
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
        <div class="ui-grid-col-8">
        	<div style="width:50%">
			<div>
			Tareas Asignadas
				<canvas id="canvas" height="450" width="600"> </canvas>
			</div>
		</div>
        </div>
    </div>
</div>






		


	<script>
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
				} /*,
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}*/
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
$('#pm').puipanelmenu();
 $('#usernamer').puiinputtext();
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
