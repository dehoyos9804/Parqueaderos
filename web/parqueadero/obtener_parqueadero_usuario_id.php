<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const PARQUEADERO="tbl_parqueaderos";
const HORARIOS = "tbl_horarios";
const TARIFAS = "tbl_tarifas";
const CAPACIDAD = "tbl_capacidad";
const MENSAJE="mensaje";
const IDENTIFICADOR = "usuario_id";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO2 = 3;

require '../../boards/tbl_parqueaderos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET[IDENTIFICADOR])){
		// Obtener parámetro idMeta
		$parametro = $_GET[IDENTIFICADOR];
		// Tratar retorno
		$retorno = tbl_parqueaderos::getParqueaderoId($parametro);

		
		//Definir tipo de respuesta 
	    header('Content-Type: application/json');

	    if ($retorno) {

	    	$parquearo_id = $retorno['id'];
	    	$horario = tbl_parqueaderos::getHorarioParqueadero($parquearo_id);
	    	$tarifas = tbl_parqueaderos::getTarifasParqueadero($parquearo_id);
	    	$capacidad = tbl_parqueaderos::getCapacidadParqueadero($parquearo_id);

	    	$datos[ESTADO] = CODIGO_EXITO;
	    	$datos[PARQUEADERO] = $retorno;
	    	$datos[HORARIOS] = $horario;
	    	$datos[TARIFAS] = $tarifas;
	    	$datos[CAPACIDAD] = $capacidad;
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