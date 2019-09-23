<?php
/**
 * Representa los datos de los usuarios
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_usuarios
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_usuarios";
	const ID = "id";
	const CEDULA="CEDULA";
	const NOMBRE="NOMBRE";
	const APELLIDO="APELLIDO";
	const TELEFONO="TELEFONO";
	const CORREO="CORREO";
	const GENERO="GENERO";
	const FECHA_NACIMIENTO="FECHA_NACIMIENTO";
	const CLAVE="CONTRASEÑA";

	function __construct()
	{
		
	}

}
?>