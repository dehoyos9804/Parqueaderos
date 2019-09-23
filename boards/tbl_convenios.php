<?php
/**
 * Representa los datos de los convenios
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_convenios
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_convenios";
	const ID = "id";
	const EMPRESA_ID ="empresa_id";
	const PARQUEADERO_ID="parqueadero_id";
	const DESCUENTO="descuento";

	function __construct()
	{
		
	}

}
?>