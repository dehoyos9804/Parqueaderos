<?php
/**
 * Actualiza una meta especificada por su identificador
 */
const ESTADO="estado";
const DATOS="tbl_capacidades";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../../boards/tbl_capacidades.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar
    $retorno = tbl_capacidades::updateZonas(
        $body['idzona'],
        $body['estado']
    );

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'Zona '.$body['numero_zona'])
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'Actualización fallida')
        );
    }
}