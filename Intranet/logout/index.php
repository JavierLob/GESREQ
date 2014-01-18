<?php
/*----------------------------------------------------------
 * 		PROYECTO: 	eProyectoCase
 * 		AUTORES:
 * 			-Amilcar Morales
 * 			-Angelica Rosendo
 * 			-Karelys Hernandez
 * 			-Maria Vargas
 * 			-Luis Bracho(Tutor)
 * 		INSTITUCION: UPTP-JJMONTILLA
 * --------------------------------------------------------*/
	session_start();
	
	if(!array_key_exists(session,$_SESSION))	//Validaciones para saber si tiene una sesion abierta
   {
	   header("location: ../index.php");
   }
   
	require_once("../lib/utilidades.php");
	require_once('../lib/constantes.php');
	
	$lobjUtil 		= new clsUtilidades();
		unset($_SESSION["idusuario"]);
		unset($_SESSION["contrasena"]);
		unset($_SESSION["nombreusuario"]);
		unset($_SESSION["apellidousuario"]);
		unset($_SESSION["nombrerol"]);
		unset($_SESSION["servicios"]);
		unset($_SESSION["modulos"]);
		unset($_SESSION["cedulausu"]);
		unset($_SESSION["rol"]);
		unset($_SESSION["ultimafecha"]);
		unset($_SESSION["ultimahora"]);
		unset($_SESSION["timeup"]);
	session_destroy();
   
	function CapturarVista() {
		$lcVista = '';
		if($_GET) {
			if(array_key_exists('q', $_GET)) {
				$lcVista = $_GET['q'];
			}
		}
		return $lcVista;
	}
	
	function ArmarVista($pcVista){
		global $lobjUtil;
		$template 	= file_get_contents(VISTA.'/logout/logout.html');
		if($pcVista==LOGOUT){
			$datos_vista= array('Titulo'	=>	'FIN DE SESIÓN',
								'Linea1'	=>	'Su sesión con aul@FRONTINO ha finalizado.',
								'Linea2'	=>  'Visitenos pronto.',
								'url'		=>  'http://aulafrontino.org.ve',
								'enlace' 	=> 	'Salir'
								);
			$template = $lobjUtil->ActualizarDatosHtml($template, $datos_vista); 
		}
		else if($pcVista==TIMEOUT){
			$datos_vista= array('Titulo'	=>	'FIN DE SESIÓN',
								'Linea1'	=>	'Su sesión con aul@FRONTINO ha caducado.',
								'Linea2'	=>  'Para continuar con su sesión debe ingresar nuevamente.',
								'url'		=>  'https://aulafrontino.org.ve/intranet/',
								'enlace' 	=> 	'Volver'
								);
			$template = $lobjUtil->ActualizarDatosHtml($template, $datos_vista);
		}
		return $template;
	}
	
	function Inicio(){
		global $datos_usuario;
		$lcVista = CapturarVista();
		switch($lcVista){
			case LOGOUT:
					$vista=ArmarVista(LOGOUT);
					print($vista);
				break;
			case TIMEOUT:
					$vista=ArmarVista(TIMEOUT);
					print($vista);
				break;
			default:
					header('location:  http://aulafrontino.org.ve/');
				break;
		}
	}
	
	Inicio();
?>
