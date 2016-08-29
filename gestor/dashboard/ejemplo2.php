
<?php
function random_password(){
	$t_val = mt_rand( 0, mt_getrandmax() ) + mt_rand( 0, mt_getrandmax() );
	$t_val = md5( $t_val );

	return $t_val;
}
echo random_password();
?>
