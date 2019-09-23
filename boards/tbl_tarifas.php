<?php
/**
 * Representa los datos de las tarifas
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_tarifas
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_tarifas";
	const ID = "id";
	const PARQUEADERO_ID="parqueadero_id";
	const TIPO_TIEMPO="tipoTiempo";
	const PRECIO="precio";
	const TIPO_VEHICULO_ID="tipoVehiculo_id";

	function __construct()
	{
		
	}

}
?>