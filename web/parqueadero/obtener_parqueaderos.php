<?php
/**
 * Obtiene todos los parqueaderos de la base de datos
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tbl_parqueaderos";
const MENSAJE="mensaje";

const CODIGO_EXITO=1;
const CODIGO_FALLO=2;

require '../../boards/tbl_parqueaderos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	//obtener gastos de la base de datos
	$parqueaderos=tbl_parqueaderos::getAll();

	//Definir tipo de respuesta 

	header('Content-Type: application/json');

	if ($parqueaderos) {
		$datos[ESTADO]=CODIGO_EXITO;
		$datos[DATOS]=$parqueaderos;
		print json_encode($datos);
	}else{
		json_encode(array(
			ESTADO=>CODIGO_FALLO,
			MENSAJE=>"Ha Ocurrido un error..."
		));
	}

}