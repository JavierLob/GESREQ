<?php
	ini_set('display_errors',1);

	session_start();
	
   
/*	if(!array_key_exists(session,$_SESSION))	//Validaciones para saber si tiene una sesion abierta
   {
	   header("location: ../index.php");
   }
	require_once("../class/intento.class.php");
  	require_once("../lib/timeout.php");
	require_once("../class/curso.class.php");
	$lobjUsuario 	= new clsUsuario();
	$lobjCurso		= new clsCurso();
	$lobjError		= new clsIntento();
	$lobjUtil 		= new clsUtilidades();
	$lobjUtil->timeout($_SESSION["timeup"]);
*/
	require_once("../class/usuario.class.php");
	require_once('../lib/utilidades.php');
	include_once('../class/requerimiento.class.php');

	$lobjUsuario = new clsUsuario;
	$lobjUtil = new clsUtilidades;	
	$lobjRequerimiento = new clsRequerimiento;

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

	
	function Inicio(){
		/*global $lobjUtil,$lobjUsuario;*/
		global $Vista_Template, $lobjRequerimiento, $lobjUtil;
		$lcVista = CapturarVista();
		switch($lcVista){
			default:			
				$estadisticas = $lobjRequerimiento->estadisticas();
				$porcentaje = ($estadisticas[2]/$estadisticas[0])*100;
				$historiales = $lobjRequerimiento->historial();
				for($i=0;$i<count($historiales);$i++)
				{
					if($historiales[$i][4]==0)
					{
						$time = 'El día de hoy.';
					}
					else
					{
						$time = 'Hace '.$historiales[$i][4].' días.';
					}
					$ACTUALIZACIONES.= '<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<img alt="'.$historiales[$i][2].'" title="'.$historiales[$i][2].'" width="29px" height="29px" src="../media/img/foto/'.$historiales[$i][2].'.jpg" />
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			El Requerimiento <b>'.$historiales[$i][1].'</b> '.$historiales[$i][0].'
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	'.$time.'
																</div>
															</div>
														</li>';
				}
				$laDatos_Estadisticas  = array('requerimientos_atendidos'=>$estadisticas[1],
											   'requerimientos_reg'		=>$estadisticas[0],
											   'cantidad_artefactos'		=>$estadisticas[3],
											   'avance'		 	=>$porcentaje,
											   'ACTUALIZACIONES'=>$ACTUALIZACIONES
					);
				$CONTENIDO		= 	file_get_contents(VISTA.'/app/escritorio.html');
				$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
				$HTML 			= 	$lobjUtil->ActualizarDatosHtml($HTML,$laDatos_Estadisticas);
				print($HTML);
			break;
		}
	}
	
	Inicio();
?>
