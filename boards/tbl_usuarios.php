<?php
/**
 * Representa los datos de los usuarios
 * almacenados en la base de datos
 */
require '../../data/DatabaseConnection.php';

/**
* 
*/
class tbl_usuarios
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbl_usuarios";
	const ID = "id";
	const CEDULA="CEDULA";
	const NOMBRE="NOMBRE";
	const APELLIDO="APELLIDO";
	const TELEFONO="TELEFONO";
	const CORREO="CORREO";
	const GENERO="GENERO";
	const FECHA_NACIMIENTO="FECHA_NACIMIENTO";
	const CLAVE="CONTRASEÑA";

	function __construct()
	{
		
	}

	/**
	*insertar nuevo usuario
	**/
	public static function insertRow($cedula, $nombre, $apellido, $telefono, $correo, $genero,$fechanacimiento, $clave, $tipousuario){
		try {
			$pdo = DatabaseConnection::getInstance()->getDb();
			// Sentencia INSERT
            $comando = "INSERT INTO tbl_usuarios(CEDULA, NOMBRE, APELLIDO,TELEFONO, CORREO, GENERO, FNACIMIENTO,CONTRASEÑA, tipousuario) 
            VALUES(?,?,?,?,?,?,?,SHA(?),?);";

            $sentencia = $pdo->prepare($comando);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
            	array($cedula,
            		$nombre,
            		$apellido,
            		$telefono,
            		$correo,
            		$genero, 
            		$fechanacimiento,
            		$clave,
            		$tipousuario
            	)
            );

            // Retornar en el último id insertado
            return $pdo->lastInsertId();
            
		} catch (PDOException $e) {
			return false;
		}
	}

	 /*
    * metodo que me permite saber si un usuario existen en el sistema
    */
    public static function get_iniciar_sesion($usuario,$clave){
        //consulta
        $consulta = "CALL iniciar_sesion(?,?);";

        try {
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($usuario,$clave));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

}
?>