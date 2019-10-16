<?php
/**
 * Representa los datos de las tarifas
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

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

	/**
     * Inserta un nuevo dato a la base de datos 
     */
	public static function insertRow($parqueadero_id,$tipo_tiempo, $precio, $tipovehiculo_id){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_tarifas(parqueadero_id, tipoTiempo, precio, tipoVehiculo_id) VALUES(?,?,?,?);";
            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($parqueadero_id,
            		$tipo_tiempo,
            		$precio,
            		$tipovehiculo_id
            	)
            );
            // Retornar en el último id insertado
            return $pdo->lastInsertId();
            
		} catch (PDOException $e) {
			return false;
		}
	}
}
?>