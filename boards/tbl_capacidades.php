<?php
/**
 * Representa los datos de los capaidades
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_capacidades
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_capacidades";
	const ID = "id";
	const PARQUEADERO_ID ="parqueadero_id";
	const TIPO_VEHICULO_ID="tipoVehiculo_id";
	const CUPOS="cupos";

	function __construct()
	{
	}

}
?>