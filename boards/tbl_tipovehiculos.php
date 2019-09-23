<?php
/**
 * Representa los datos de los tipos de vehiculos
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_tipovehiculos
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_tipovehiculos";
	const ID = "id";
	const NOMBRE="nombre";

	function __construct()
	{
		
	}

}
?>