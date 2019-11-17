<?php
/**
 * Representa los datos de las empresas
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

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

	/**
     * Obtiene todos las tarifas de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
	public static function getEmpresasForParqueadero($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_convenios_empresa(?);";

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
     * Obtiene todos las tarifas de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
	public static function getConveniosParqueaderos($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_convenios_for_parqueaderos(?);";

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
	public static function insertEmpresa($nit, $razonSocial, $direccion, $telefono){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_empresas(nit,razonSocial,direccion,telefono) VALUES (?,?,?,?);";

            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($nit,
            		$razonSocial,
            		$direccion,
            		$telefono
            	)
            );

            // Retornar en el último id insertado
            return $pdo->lastInsertId();
            
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
     * Inserta un nuevo dato a la base de datos 
     */
	public static function insertConvenio($empresa_id, $parqueadero_id, $descuento){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_convenios(empresa_id,parqueadero_id,descuento) VALUES (?,?,?);";

            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($empresa_id,
            		$parqueadero_id,
            		$descuento
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