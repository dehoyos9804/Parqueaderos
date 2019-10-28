<?php
/**
 * Representa los datos de los horarios
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

/**
* 
*/
class tbl_horarios
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_horarios";
	const ID = "id";
	const PARQUEADERO_ID ="parqueadero_id";
	const DIA_SEMANA="diasemana";
	const HORA_INICIAL="horaI";
	const HORA_FINAL="horaF";

	function __construct()
	{
		
	}

	/**
     * Obtiene las capacidades del parqueaderos que tiene un usuario
     */
	public static function getHorarios($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_all_horario_parqueadero(?)";

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
	public static function insertRow($parqueadero_id,$diasemana, $horaI, $horaF){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_horarios(parqueadero_id, diasemana, horaI, horaF) VALUES(?,?,?,?);";
            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($parqueadero_id,
            		$diasemana,
            		$horaI,
            		$horaF
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