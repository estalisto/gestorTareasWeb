<html>
<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.11.1/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/themes/Redmond/theme.css" />
 <link rel="stylesheet" type="text/css" href="librerias/font-awesome-4.6.3/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="librerias/primeui-4.1.12/primeui.min.css" />
<script type="text/javascript" src="librerias/jquery-1.11.1/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="librerias/jquery-ui-1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="librerias/primeui-4.1.12/primeui.min.js"></script>


<script type="text/javascript">
$(function() {
    $('#mb1').puimenubar({
            autoDisplay: true
        });

        $('#mb2').puimenubar({
            autoDisplay: false
        });
      /*  $('#destroySesionID').puibutton().click(function() {
           document.location.href="/gestor/dashboard/pages/cerrarSesion.php";
         });*/

	 });

</script>


<ul id="mb1">
  <li> <a data-icon="fa-child" href="/gestor/dashboard/"  >Incio</a>

  </li>
    <li> <a >Solicitud</a>
        <ul>
            <li><a data-icon="fa-pencil" href="/gestor/dashboard/pages/solicitudes/frm_gestor_ingreso.php" >Nueva Solicitud</a>

            </li>
            <li><a data-icon="fa-search"  href="/gestor/dashboard/pages/solicitudes/frm_consultaSolicitudes.php" >Ver Solicitudes</a></li>

        </ul>
    </li>
    <li> <a data-icon="fa-contact">Reportes</a>

    </li>
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



</html>
