<?php
include('/core/adodb5/adodb.inc.php');
$DB = NewADOConnection('mysql');
$DB->Connect('localhost', 'root', null, 'gestor');
$query = $DB->Prepare("insert into gestor_usuario (USUARIO, NOMBRES, APELLIDOS, EMAIL, CLAVE, TELEFONO, NIVEL_ACCESO, FECHA_CREACION) values('yguachamin','YESSICA ','GUACHAMIN','yguachamin@hotmail.com','567','0993800504','50','9')");
//$rs = $DB->Execute("select * from gestor_usuario");

$result = $DB->Execute($query) 
or die("Error in query: $query. " . $db->ErrorMsg());
/*foreach ($rs as $row) {
    print_r($row);
}*/
?>