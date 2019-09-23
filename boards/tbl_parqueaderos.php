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


	/**
     * Inserta un nuevo dato a la base de datos 
     */

	public static function insertRow($monto, $etiqueta, $fecha, $descripcion){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO " . self::TABLE_NAME . " ( " .
                self::MONTO . "," .
                self::ETIQUETA . "," .
                self::FECHA . "," .
                self::DESCRIPCION . ")" .
                " VALUES(?,?,?,?)";

            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($monto,
            		$etiqueta,
            		$fecha,
            		$descripcion
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