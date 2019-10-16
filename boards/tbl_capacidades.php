<?php
/**
 * Representa los datos de los capaidades
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

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

	/**
     * Obtiene las capacidades del parqueaderos que tiene un usuario
     */
	public static function getCapacidad($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_capacidad_parqueadero(?)";

		try{
			//preparar sentencia
			$comando=DatabaseConnection::getInstance()->getDb()->prepare($consulta);
			//ejecutar secuencia preparada
			$comando->execute(array($parqueadero_id));

			return $comando->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return false;
		}
	}

	/**
     * Inserta un nuevo dato a la base de datos 
     */
	public static function insertRow($parqueadero_id, $tipovehiculo_id, $cupos){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_capacidades(parqueadero_id, tipoVehiculo_id,cupos) VALUES(?,?,?);";
            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($parqueadero_id,
            		$tipovehiculo_id,
            		$cupos
            	)
            );
            // Retornar en el último id insertado
            return $pdo->lastInsertId();
            
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
     * Obtiene las capacidades del parqueaderos que tiene un usuario
     */
	public static function getZonas($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_all_zonas(?)";

		try{
			//preparar sentencia
			$comando=DatabaseConnection::getInstance()->getDb()->prepare($consulta);
			//ejecutar secuencia preparada
			$comando->execute(array($parqueadero_id));

			return $comando->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return false;
		}
	}

}
?>