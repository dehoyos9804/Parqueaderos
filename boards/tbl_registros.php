<?php
/**
 * Representa los datos de los registros
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

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

	/**
     * Obtiene todos las tarifas de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
	public static function getReporteDeVenta($parqueadero_id, $fechainicial, $fechafinal){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_reportes_venta(?,?,?);";

		try{
			//preparar sentencia
			$comando=DatabaseConnection::getInstance()->getDb()->prepare($consulta);
			//ejecutar secuencia preparada
			$comando->execute(array($parqueadero_id, $fechainicial, $fechafinal));

			return $comando->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return false;
		}
	}

	

}
?>