<?php
/**
 * Obtiene todos los parqueaderos de la base de datos
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tbl_tipovehiculos";
const MENSAJE="mensaje";

const CODIGO_EXITO=1;
const CODIGO_FALLO=2;

require '../../boards/tbl_tipovehiculos.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	//obtener gastos de la base de datos
	$result=tbl_tipovehiculos::getAll();

	//Definir tipo de respuesta 
	header('Content-Type: application/json');

	if ($result) {
		$datos[ESTADO]=CODIGO_EXITO;
		$datos[DATOS]=$result;

		print json_encode($datos);
	}else{
		json_encode(array(
			ESTADO=>CODIGO_FALLO,
			MENSAJE=>"Ha Ocurrido un error..."
		));
	}

}