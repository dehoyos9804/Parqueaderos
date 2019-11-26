<?php
/**
 * Insertar un nuevo dato en la base de datos
 */
const ESTADO="estado";
const DATOS="tbl_usuarios";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../../boards/tbl_usuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	// Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar meta
    $retorno = tbl_usuarios::insertRow(
    	         $body['cedula'],
                 $body['nombres'],
                 $body['apellidos'],
                 $body['telefono'],
                 $body['correo'],
                 $body['genero'],
                 $body['fechanacimiento'],
                 $body['clave'],
                 $body['tipousuario']
                );

    header("Content-Type: application/json");
    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'Creacion exitosa')
        );

    } else {
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => $retorno)
        );
    }
}