<?php
/**
 * Representa los datos de los tipos de vehiculos
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

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

	/**
     * Obtiene todos los parqueaderos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
	public static function getAll(){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="SELECT * FROM ".self::TABLE_NAME;

		try{
			//preparar sentencia
			$comando=DatabaseConnection::getInstance()->getDb()->prepare($consulta);
			//ejecutar secuencia preparada
			$comando->execute();

			return $comando->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return false;
		}
	}

}
?>