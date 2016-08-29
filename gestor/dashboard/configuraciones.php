<?php
require_once('/core/adodb5/adodb.inc.php');
$DB = NewADOConnection('mysql');
$DB->Connect('localhost', 'root', '', 'gestor');


$niveles_acceso        = array('10'      => 'espectador',
                               '20'      => 'solicitante',
							   '30'      => 'ejecutor',
                               '40'      => 'supervisor',
							   '50'	     => 'administrador');

$tipo_campo        = array(10     => 'Numerico',
                           20     => 'Cadena',
						   30     => 'Area de Texto',
                           40     => 'Lista',
						   50	  => 'Radio');

/*
define('HOST','localhost'); //AQUI VA TU HOST
define('USER','root');
define('PASS','');
define('DBNAME','gestor');

class BaseDatos
{
    protected $conexion;
    protected $db;

    public function conectar()
    {
        $this->conexion = mysql_connect(HOST, USER, PASS);
        if ($this->conexion == 0) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
        $this->db = mysql_select_db(DBNAME, $this->conexion);
        if ($this->db == 0) DIE("Lo sentimos, no se ha podido conectar con la base datos: " . DBNAME);

        return true;

    }

    public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysql_close($this->$conexion);
        }

    }

    public function pruebadb()
    {
        $tabla = "<strong>TU_TABLA</strong>";
        $query = mysql_query("SELECT count(*) from $tabla", $this->conexion);
        if ($query == 0) echo "Sentencia incorrecta llamado a tabla: $tabla.";
        else {
            $nregistrostotal = mysql_result($query, 0, 0);
            echo "Hay $nregistrostotal registros en la tabla: $tabla.";
            mysql_free_result($query);
        }
    }
}
*/

?>
