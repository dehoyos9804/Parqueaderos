<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tbl_registros";
const MENSAJE="mensaje";
const IDENTIFICADOR = "parqueadero_id";
const FECHAINICIAL = "fechainicial";
const FECHAFINAL = "fechafinal";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO2 = 3;

require '../../boards/tbl_registros.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET[IDENTIFICADOR])){
		// Obtener parámetro idMeta
		$parqueadero_id = $_GET[IDENTIFICADOR];
		$fechainicial = $_GET[FECHAINICIAL];
		$fechafinal = $_GET[FECHAFINAL];

		// Tratar retorno
		$retorno = tbl_registros::getReporteDeVenta($parqueadero_id,$fechainicial, $fechafinal);

		//Definir tipo de respuesta 
	    header('Content-Type: application/json');

	    if ($retorno) {
	    	$datos[ESTADO] = CODIGO_EXITO;
	    	$datos[DATOS] = $retorno;
	    	// Enviar objeto json
            print json_encode($datos);
	    }else{
	    	// Enviar respuesta de error general
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'No se obtuvo el registro'
                )
            );
	    }

	}else{
		// Enviar respuesta de error
		print json_encode(
			array(
				ESTADO=>CODIGO_FALLO2,
				MENSAJE=>'Se necesita un identificador'
			)
		);
	}
}

?>