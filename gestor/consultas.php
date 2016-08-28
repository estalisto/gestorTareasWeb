<?php

 require_once( 'configuraciones.php' );
 require_once( 'funciones.php' );
 
 $nombre= $_POST [ "nombre1" ];
 $bandera=$_POST [ "bandera" ];
 $filtro=null;
 $filtro=($bandera=='1')?'not in' : 'in';
 
 $data=null;
$existente1=$DB->Execute("select id_tema, nombre
											  from gestor_temas
											 where id_tema $filtro
												   (select id_tema
													  from gestor_temas_areas
													 where id_area in (select id_area
																		from gestor_areas
																	   where nombre = '$nombre'))
											   and estado = 'A' order by  1 desc");


    	if (count($existente1)>0){
		 foreach ($existente1 as $y=>$area_existente) {
     $areasex[]=$area_existente; 
                  }  
		  for($i=0 ; $i<count($areasex); $i++) 
 {
    $data.=$areasex[$i]['id_tema'].'-'.$areasex[$i]['nombre'].'	|';
 }
}
 

echo $data;
?>