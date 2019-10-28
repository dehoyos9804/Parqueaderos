<?php
/**
 * Representa los datos de los parqueaderos
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

/**
* 
*/
class tbl_parqueaderos
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_parqueaderos";
	const ID = "id";
	const CODIGO_CAMARA_COMERCIO ="CodigoCamaraComercio";
	const RAZON_SOCIAL="RazonSocial";
	const TELEFONOS="TELEFONO";
	const DIRECCION="DIRECCION";
	const USUARIO_ID="usuario_id";
	const UBICACION_LATITUD="UbicacionLat";
	const UBICACION_LONGITUD="UbicacionLon";
	const FOTO="Foto";
	const DESCRIPCION="Descripcion";

	function __construct()
	{
	}

	/**
     * Obtiene todos los parqueaderos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
	public static function getAll(){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_all_parqueaderos";

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

	/**
     * Obtiene todos las tarifas de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
	public static function getTarifaParqueaderoId($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_all_tarifas_parqueaderos(?);";

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
     * Obtiene la cantidad de parqueaderos que tiene un usuario
     */
	public static function getNumeroParqueaderos($usuario_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="SELECT COUNT(tbl_parqueaderos.id) AS cantidad FROM tbl_parqueaderos WHERE tbl_parqueaderos.usuario_id = ?;";

		try{
			//preparar sentencia
			$comando=DatabaseConnection::getInstance()->getDb()->prepare($consulta);
			//ejecutar secuencia preparada
			$comando->execute(array($usuario_id));

			return $comando->fetch(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return false;
		}
	}


	/**
     * Obtiene la cantidad de parqueaderos que tiene un usuario
     */
	public static function getParqueaderoId($usuario_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="SELECT * FROM tbl_parqueaderos WHERE usuario_id = ?;";

		try{
			//preparar sentencia
			$comando=DatabaseConnection::getInstance()->getDb()->prepare($consulta);
			//ejecutar secuencia preparada
			$comando->execute(array($usuario_id));

			return $comando->fetch(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return false;
		}
	}
	

	/**
     * Obtiene los horarios del parqueaderos que tiene un usuario
     */
	public static function getHorarioParqueadero($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="SELECT * FROM tbl_horarios WHERE parqueadero_id = ?;";

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
     * Obtiene las tarifas del parqueaderos que tiene un usuario
     */
	public static function getTarifasParqueadero($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_tarifas_parqueadero(?);";

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
     * Obtiene las capacidades del parqueaderos que tiene un usuario
     */
	public static function getCapacidadParqueadero($parqueadero_id){
		//$consulta="SELECT * FROM ".self::TABLE_NAME;
		$consulta="CALL sp_capacidad_zonas_parqueaderos(?);";

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

	public static function insertRow($codigocamaracomercio, $razonsocial, $telefono, $direccion, $usuarioid, $latitud, $longitud, $foto, $descripcion){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_parqueaderos(CodigoCamaraComercio,RazonSocial,TELEFONO,DIRECCION,usuario_id,UbicacionLat,ubicacionLon,Foto,Descripcion) VALUES (?,?,?,?,?,?,?,?,?);";

            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($codigocamaracomercio,
            		$razonsocial,
            		$telefono,
            		$direccion,
            		$usuarioid, 
            		$latitud,
            		$longitud,
            		$foto, 
            		$descripcion
            	)
            );

            // Retornar en el último id insertado
            return $pdo->lastInsertId();
            
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	*Insertar una nueva reservar por parte del cliente
	**/
	public static function insertReserva($usuario_id, $parqueadero_id, $fechaHoraReserva, $tiempollegada, $tipoVehiculo_id){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_reserva(usuario_id, parqueadero_id, fechaHoraReserva, tiempoLlegada, tipovehiculo_id)
 				VALUES (?,?,?,?,?);";

            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($usuario_id,
            		$parqueadero_id,
            		$fechaHoraReserva,
            		$tiempollegada,
            		$tipoVehiculo_id
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