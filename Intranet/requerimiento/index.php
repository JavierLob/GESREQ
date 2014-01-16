<?php
	ini_set('display_errors',1);

	session_start();
	
	/*if(!array_key_exists(session,$_SESSION))	//Validaciones para saber si tiene una sesion abierta
   {
	   header("location: ../index.php");
   }
   
  	require_once("../lib/timeout.php");
	require_once("../class/usuario.class.php");
	require_once("../class/intento.class.php");
	require_once("../lib/utilidades.php");
	require_once("../class/curso.class.php");
	$lobjUsuario 	= new clsUsuario();
	$lobjCurso		= new clsCurso();
	$lobjError		= new clsIntento();
	$lobjUtil 		= new clsUtilidades();
	$lobjUtil->timeout($_SESSION["timeup"]);
*/
	require_once('../lib/constantes.php');
	include_once('../lib/armar_cuerpo.php');
	function CapturarVista() 
	{
		$lcVista = '';
		if($_GET) 
		{
			if(array_key_exists('q', $_GET))
			{
				$lcVista = $_GET['q'];
			}
		}
		return $lcVista;
	}
	$msj=$_SESSION['msj'];
	$titulo=$_SESSION['titulo'];
	unset($_SESSION['msj']);
	unset($_SESSION['titulo']);

	function Inicio(){
		/*global $lobjUtil,$lobjUsuario;*/
		global $Vista_Template,$titulo,$msj;
		$lcVista = CapturarVista();
		switch($lcVista){
			case 'registro_requerimiento':
				if(!$msj)
				{
					if($msj=='exito')
					{

					}
					elseif ($msj=='error') 
					{
						
					}
				}
				else
				{
					$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/registro_requerimiento.html');
					$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
				}
				print($HTML);
			break;
			default:			
				$CONTENIDO		= 	file_get_contents(VISTA.'/app/escritorio.html');
				$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
				print($HTML);
			break;
		}
	}
	
	Inicio();
?>
