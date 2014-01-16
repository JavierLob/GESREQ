<?php
	//		LOGICA DE LA VISTA LOGIN
	ini_set('display_errors', 0); //Desactiva los mensajes de error.
	
	session_start();		//Inicia Sesion
	if(array_key_exists(session,$_SESSION))	//Validaciones para saber si tiene una sesion abierta
    {
	   header("location: ../app");
    }
	/*if(!$_SERVER['HTTPS'])
	{
		$url_actual = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	    header('location:'.$url_actual);
	}*/
	//		Require de las clases y librerias necesarias.
	require_once('../class/intento.class.php');
	require_once('../lib/constantes.php');
	
	$lobjIntento			= new clsIntento(); //Instancia de la clase
	
	//Declara Atributos
	$laDatos_Cliente 		= array();
	$lcEstatus_Cliente		= "";
	$llEncontro				= false;
	$llEncontro		 		= $lobjIntento->Buscar_Datos_Cliente();
	
	if($llEncontro)
	{
		$lcEstatus_Cliente	= $lobjIntento->get_Estatus_Ip();
	}


	
	//Diccionario GLOBAL
	$laDiccionario = array(	'invalido_uno'		=>array(
												'titulo'		=>'ERROR DE AUTENTICACIÓN',
											    'linea1'		=>INVALIDO_UNO_LINEA_UNO,
											    'linea2'		=>INVALIDO_UNO_LINEA_DOS,
											    'url'			=>'./',
											    'enlace'		=>'Volver a intentarlo'
												),
							'invalido_dos'		=>array(
												'titulo'		=>'ERROR DE AUTENTICACIÓN',
						 					    'linea1'		=>INVALIDO_DOS_LINEA_UNO,
											    'linea2'		=>INVALIDO_DOS_LINEA_DOS,
											    'url'			=>'./',
											    'enlace'		=>'Volver a intentarlo'
						 						),
							'invalido_tres'		=>array(
												'titulo'		=>'ERROR DE AUTENTICACIÓN',
						 					    'linea1'		=>INVALIDO_TRES_LINEA_UNO,
											    'linea2'		=>INVALIDO_DOS_LINEA_DOS,
											    'url'			=>'http://aulafrontino.org.ve',
											    'enlace'		=>'Condiciones de Uso'
						 						),
							'bloqueado'			=>array(
												'titulo'		=>'BLOQUEADO',
						 					    'linea1'		=>BLOQUEADO_LINEA_UNO,
											    'linea2'		=>BLOQUEADO_LINEA_DOS,
											    'url'			=>'http://aulafrontino.org.ve',
											    'enlace'		=>'Volver al inicio'
						 						)
							);
							
	function Capturar_Vista() 
	{
		$lcVista = '';
		if($_SESSION) 
		{
			if(array_key_exists('mensaje', $_SESSION)) 
			{
				$lcVista 	= $_SESSION['mensaje'];
				unset($_SESSION['mensaje']);
				session_destroy();
			}
		}
		return $lcVista;
	}
	
	function Capturar_Evento() 
	{
		$lcEvento = 'default';
		if($_SESSION) 
		{
			if(array_key_exists('mensaje', $_SESSION)) 
			{
				$lcEvento='mensaje';
			}
		}
		return $lcEvento;
	}
	
	function Actualizar_Datos_Html($pcPagina, $pcDatos)
	{
		$lcClave	= "";
		$lcValor	= "";
        foreach ($pcDatos as $lcClave=>$lcValor) 
		{
        	$pcPagina = str_replace('{'.$lcClave.'}', $lcValor, $pcPagina);
        }
         return $pcPagina;
    }
	
	
	function Armar_Vista($pcVista)
	{
		global $laDiccionario;
		$lcTemplate 	= file_get_contents(VISTA.'/login/login_invalido.html');
		if($pcVista	=='invalido1')
		{
			$lcTemplate = Actualizar_Datos_Html($lcTemplate, $laDiccionario['invalido_uno']);
		}
		else if($pcVista=='invalido2')
		{
			$lcTemplate = Actualizar_Datos_Html($lcTemplate, $laDiccionario['invalido_dos']);
		}
		else if($pcVista=='invalido3')
		{
			$lcTemplate = Actualizar_Datos_Html($lcTemplate, $laDiccionario['invalido_tres']);
		}
		else if($pcVista=='bloqueado')
		{
			$lcTemplate = Actualizar_Datos_Html($lcTemplate, $laDiccionario['bloqueado']);
		}
		return $lcTemplate;
		
	}
	
	function Inicio()
	{
		global $lcEstatus_Cliente;
		$lcEvento		= "";
		$lcVista		= "";
		$HTML			= "";
		$lcEvento 		= Capturar_Evento();
		
		if( $lcEvento == 'mensaje' )
		{
			$lcVista 	= Capturar_Vista();
		}
		
		switch($lcVista)
		{
			case 1:
					$HTML	= Armar_Vista('invalido1');
					print($HTML);
				break;
			case 2:
					$HTML	= Armar_Vista('invalido2');
					print($HTML);
				break;
			case 3:
					$HTML	= Armar_Vista('invalido3');
					print($HTML);
				break;
			case 4:
					$HTML	= Armar_Vista('bloqueado');
					print($HTML);
				break;
			default:
				if($lcEstatus_Cliente==0)
				{
					$BASE_HTML	= file_get_contents(VISTA.'/login/cuerpo_base.html');
					$CUERPO_HTML= file_get_contents(VISTA.'/login/login.html');
					$HTML		= str_replace('{CUERPO_HTML}', $CUERPO_HTML, $BASE_HTML);
					$HTML		= str_replace('{TITULO_HTML}', 'Intranet | Aul@Frontino', $HTML); 				
				}
				else
				{
					$HTML	= Armar_Vista('bloqueado');
				}
					print($HTML);
				break;
		}
	}

Inicio();	//Funcion Inicio (Pone a andar la logica de la vista).
?>
