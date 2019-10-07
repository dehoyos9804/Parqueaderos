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

    // Insertar meta
    $retorno = tbl_parqueaderos::insertReserva(
    	         $body['usuario_id'],
                 $body['parqueadero_id'],
                 $body['fecha'],
                 $body['tiempo_llegada'],
                 $body['tipo_vehiculo_id']
                );

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'Reserva Creada exitosamente')
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