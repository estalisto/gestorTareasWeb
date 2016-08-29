<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 

    $nombre= $_POST["nombre"];
    $tema= $_POST["tema"];
	
	$array = explode ( "	" , $tema ); 
	
	
	$exito=0;
	$error=0;
	foreach ($array as $valor)
	{
	 
	 $valor=trim($valor);
	 if($valor!=''){
	 $verifica="select id
			  from gestor_temas_areas
			 where id_tema =
			       (select id_tema from gestor_temas where nombre = '$valor')
			   and id_area = (select id_area
					    from gestor_areas
					   where nombre = '$nombre');";
					   
		$rs = $DB->Execute($verifica);
	        $cont=0;

		foreach ($rs as $x=>$dato) {
		    $cont+=1; 
		}
				   
					   
	if ($cont==0){				   
	 $sql="insert  into gestor_TEMAS_AREAS(ID_TEMA,
                                 ID_AREA,
                                 ESTADO,
                                 FECHA_CREACION,
                                 USUARIO_CREACION)
                                 values ((select id_tema from gestor_temas where nombre= '$valor'),
                                        (select id_area from gestor_areas where nombre= '$nombre'),
                                         'A',
                                         UNIX_TIMESTAMP( NOW()),
                                         LEFT(CURRENT_USER(), INSTR(CURRENT_USER(), '@') - 1))";
	
	
	if (! ($DB-> Execute ($sql))) {
	 $error +=1;
	 //echo $DB->ErrorMsg();
	 
	 }
	 else
	 {
	 $exito +=1;
	 }
   }
 }
}
	
echo 'Procesadas con exito: '.$exito.' con error: '.$error;	
?>
