<?php
/*
*Obtiene los datos necesarios que se necesitan en la consulta de inicio
*/
//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tbl_usuarios";
const MENSAJE="mensaje";
const USUARIO = "usuario";
const UPASSWORD = "clave";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO2 = 3;

require '../../boards/tbl_usuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET[USUARIO]) && isset($_GET[UPASSWORD])){
		//obtener parámetro usuario
		$parametro1 = $_GET[USUARIO];
		$parametro2 = $_GET[UPASSWORD];

		// Tratar retorno
		$retorno = tbl_usuarios::get_iniciar_sesion($parametro1, $parametro2);
		//Definir tipo de respuesta 
	    header('Content-Type: application/json');

	    if ($retorno){
	    	$datos[ESTADO] = CODIGO_EXITO;
	    	$datos[DATOS] = $retorno;
	    	// Enviar objeto json
            print json_encode($datos);
	    }else{
	    	// Enviar respuesta de error general
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Usuario y/o Contraseña Incorrecta'
                )
            );
	    }

	}else{
		// Enviar respuesta de error
		print json_encode(
			array(
				ESTADO=>CODIGO_FALLO2,
				MENSAJE=>'usuario y/o contraseñas vacias'
			)
		);
	}
}

?>