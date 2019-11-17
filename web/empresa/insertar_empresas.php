<?php
/**
 * Insertar un nuevo dato en la base de datos
 */
const ESTADO="estado";
const DATOS="tbl_empresas";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO_2 = 3;

require '../../boards/tbl_empresas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	// Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar meta
    $retorno = tbl_empresas::insertEmpresa(
    	         $body['nit'],
                 $body['razonsocial'],
                 $body['direccion'],
                 $body['telefono']
                );

    header("Content-Type: application/json");

    if ($retorno) {

        $convenio = tbl_empresas::insertConvenio(
                 $retorno,
                 $body['parqueadero_id'],
                 "0"
                );

        if($convenio){
            // Código de éxito
            print json_encode(
                array(
                    ESTADO => CODIGO_EXITO,
                    MENSAJE => 'Creacion Exitoso')
            );
        }else{
            // Código de éxito
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Error al guardar el convenio')
            );
        }

    } else {
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO_2,
                MENSAJE => "Error al guardar la empresa")
        );
    }
}