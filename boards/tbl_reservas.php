<?php
/**
 * Representa los datos de las reservas
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

/**
* 
*/
class tbl_reservas
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_reservas";
	const ID = "id";
	const USUARIO_ID ="usuario_id";
	const PARQUEADERO_ID="parqueadero_id";
	const FECHA_HORA_RESERVA="fechaHoraReserva";
	const TIEMPO_LLEGADA="tiempoLLegada";
	const TIPO_VEHICULO_ID="tipoVehiculo_id";

	function __construct()
	{
		
	}

}
?>