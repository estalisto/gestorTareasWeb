<?php



 ?>
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
   $('#password').puipassword();
   $('#usernamer').puiinputtext();
   $('#areaLogin').puifieldset();
   $('#guardar').puibutton({
       icon: 'fa-check'
   });
   $('#default').puimessages();
   $('#btn-ingresar').puibutton().click(function() {
     if($('#usernamer').val()==""){
      //  alert("Ingrese el nombre de usuario");
        //$('#messages').puigrowl('show', [{severity:'info', summary: 'Alerta', detail: ('Ingrese el nombre del Usuario')}]);
         addMessage('error', {summary: 'Alerta:', detail: 'Debe ingresar un usuario'});
        return false;
      }
      else{
        var usuario = $('#usernamer').val();
      }

      if($('#password').val()==""){
         //alert("Ingrese el nombre de usuario");
         //$('#messages').puigrowl('show', [{severity:'info', summary: 'Alerta', detail: ('Ingrese el nombre del Usuario')}]);
          addMessage('error', {summary: 'Alerta:', detail: 'Debe ingresar la contraseña'});
         return false;
       }
       else{
         var password = $('#password').val();
       } /*
       jQuery.post("validaUsuario.php", {
         usuario:usuario,
         password:password
       }, function(data, textStatus){
         if(data == 1){
           $('#res').html("Datos insertados correctamente.");
           $('#res').css('color','green');
         }
         else
         {
         if(data == 2){
           addMessage('error', {summary: 'Error:', detail: 'Usuario o contraseña es incorrecto.'});
                      }
         }
       });*/
   });

   addMessage = function(severity, msg) {
       $('#default').puimessages('show', severity, msg);
       document.getElementById('msgs').show(severity, msg);
   }
 	 });

 </script>
<body>
<CENTER>
  <table width="400">
    <tr>
      <th><fieldset id="areaLogin">
          <legend>Inicar sesión</legend>
          <h3>Usuario:</h3>
          <input id="usernamer" type="text" />
          <h3>Contraseña:</h3>
          <input id="password" name="default" type="password" />
      <h3></h3>
      <button id="btn-ingresar" type="button">Ingresar</button>

      </fieldset>
    </th>
    </tr>

  </table>

  <div id="default"></div>
  <p-messages id="msgs"></p-messages>

</CENTER>

</body>




 </html>
