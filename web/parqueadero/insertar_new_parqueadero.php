<?php
/**
 * Insertar un nuevo dato en la base de datos
 */
const ESTADO="estado";
const DATOS="tblusuarios";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../../boards/tbl_parqueaderos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	// Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    $user = $body['usuarioid'];

    $path = "../../web/parqueadero/image/img-$user.jpg";
    $local_host = "localhost";
    $url = "http://$local_host/Parqueaderos/$path";

    $imagen = $body['foto'];
    file_put_contents($path, base64_decode($imagen));//guardo la imagen en mi directorio
    $bytesArchivo = file_get_contents($path);
    // Insertar meta
    $retorno = tbl_parqueaderos::insertRow(
    	         $body['codigocamaracomercio'],
                 $body['razonsocial'],
                 $body['telefono'],
                 $body['direccion'],
                 $body['usuarioid'],
                 $body['latitud'],
                 $body['longitud'],
                 $bytesArchivo,
                 $body['descripcion']
                );

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'Parqueadero Creado Exitosamente'
            )
        );

    } else {
    	header("Content-Type: application/json");
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => $retorno)
        );
    }
}