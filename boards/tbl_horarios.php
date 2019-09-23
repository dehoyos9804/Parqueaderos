<?php
/**
 * Representa los datos de los horarios
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_horarios
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_horarios";
	const ID = "id";
	const PARQUEADERO_ID ="parqueadero_id";
	const DIA_SEMANA="diasemana";
	const HORA_INICIAL="horaI";
	const HORA_FINAL="horaF";

	function __construct()
	{
		
	}

}
?>