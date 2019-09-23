<?php
/**
 * Representa los datos de las empresas
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_empresas
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_empresas";
	const ID = "id";
	const NIT ="nit";
	const RAZON_SOCIAL="razonSocial";
	const DIRECCION="direccion";
	const TELEFONO="telefono";

	function __construct()
	{
		
	}

}
?>