<?php
/**
 * Representa los datos de los registros
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_registros
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_registros";
	const ID = "id";
	const NUMERO_VENTA ="numeroVenta";
	const FECHA_HORA_INGRESO="fechaHoraIngreso";
	const NO_CUPON="NoCupo";
	const FECHA_HORA_SALIDA="fechaHoraSalida";
	const USUARIO_ID="usuario_id";
	const TARIFA_ID="tarifa_id";
	const PRECIO_TARIFA="precioTarifa";
	const CALIFICACION="calificacion";
	const COMENTARIO="comentario";

	function __construct()
	{
		
	}

}
?>