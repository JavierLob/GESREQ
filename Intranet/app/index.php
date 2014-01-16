<?php
	ini_set('display_errors',1);
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
   
  	require_once("../lib/timeout.php");
	require_once("../class/usuario.class.php");
	require_once("../class/intento.class.php");
	require_once("../lib/utilidades.php");
	require_once('../lib/constantes.php');
	require_once("../class/curso.class.php");
	$lobjUsuario 	= new clsUsuario();
	$lobjCurso		= new clsCurso();
	$lobjError		= new clsIntento();
	$lobjUtil 		= new clsUtilidades();
	include_once('../lib/armar_cuerpo.php');
	$lobjUtil->timeout($_SESSION["timeup"]);

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
		global $lobjUtil,$lobjUsuario;
		global $laDatos_Usuario, $Vista_Template,$lobjCurso;
		$lcVista = CapturarVista();
		switch($lcVista){
			case LOGIN_AULA:
					$CUERPO 		= file_get_contents(VISTA.'/app/login_aula.html');
					$laDatos_Cuerpo = array('Titulo'	=>	'Acceso al Aula Virtual',
										  'Action'	=>	'https://aulafrontino.org.ve/intranet/moodle/login/index.php'
										   );
					$NAVEGACION	 = '<li><a href="#" onclick="window.close();" >Inicio</a></li>';
					$NAVEGACION .= '<li><a href="#">Aula Virtual</a></li>';
					$HTML  			= $lobjUtil->ActualizarDatosHtml($CUERPO, $laDatos_Cuerpo);
					$HTML  			= $lobjUtil->ActualizarDatosHtml($HTML, $laDatos_Usuario);
					$HTML			= str_replace('{CUERPO}',$HTML,$Vista_Template);
					$HTML			= str_replace('{Navegacion}',$NAVEGACION,$HTML);
					$HTML			= str_replace('{MENU_LATERAL}',$MENU_LATERAL,$HTML);
					print($HTML);
				break;
			case LOGIN_FORO:
					$CUERPO 	= file_get_contents(VISTA.'/app/login_foro.html');
					$laDatos_Cuerpo  = array('Titulo'	=>	'Acceso al foro aul@FRONTINO',
								  			'Action'	=>	'https://aulafrontino.org.ve/foro/ucp.php?mode=login'
								  			);
					$NAVEGACION	 = '<li><a href="#" onclick="window.close();" >Inicio</a></li>';
					$NAVEGACION .= '<li><a href="#">Foro</a></li>';
					$HTML  			= $lobjUtil->ActualizarDatosHtml($CUERPO, $laDatos_Cuerpo);
					$HTML  			= $lobjUtil->ActualizarDatosHtml($HTML, $laDatos_Usuario);
					$HTML			= str_replace('{CUERPO}',$HTML,$Vista_Template);
					$HTML			= str_replace('{Navegacion}',$NAVEGACION,$HTML);
					$HTML			= str_replace('{MENU_LATERAL}',$MENU_LATERAL,$HTML);
					print($HTML);
				break;
			default:
				if($_SESSION['rol']=='2')
				{	

					$listadoCurso   =  $lobjCurso->estadisticasAsistencia($_SESSION['cedulausu']);					
					$listadoAgenda   =  $lobjCurso->agendaEstudiante($listadoCurso,$_SESSION['semana']);
					if($listadoCurso)
					{
						for($i=0;$i<count($listadoCurso);$i++)
						{
							$nombre_curso	=	$listadoCurso[$i][0];
							$profesor		= 	$listadoCurso[$i][1].' '.$listadoCurso[$i][2];
							$seccion  = 	$listadoCurso[$i][3];
							$modulo  = 	$listadoCurso[$i][4];
							$asistencia  = 	$listadoCurso[$i][5];
							if(!$asistencia)
								$asistencia=0;
							$total_sesion  = 	$listadoCurso[$i][6];
							$nota  = 	$listadoCurso[$i][7];
							if(!$nota)
								$nota=0;
							$total_eva  = 	$listadoCurso[$i][8];
							if(!$total_eva)
								$total_eva=0;
							$num_eva  = 	$listadoCurso[$i][9];
							if(!$num_eva)
								$num_eva=0;
							$asistencia_eva  = 	$listadoCurso[$i][10];
							if(!$asistencia_eva)
								$asistencia_eva=0;

							if($nota>=($total_eva/2))
							{
								$proyeccion='<i class="icon-plus"></i>';
							}
							else
							{
								$proyeccion='<i class="icon-minus"></i>';
							}
							//BOTON DE AULA
							$LISTADO_CURSOS.= '<tr>';
							$LISTADO_CURSOS.= '<td style="width:550px;">'.$nombre_curso.'-'.$seccion.'</td>';
							$LISTADO_CURSOS.= '<td style="text-align: center;"><b>'.$asistencia.'/'.$total_sesion.'</b></label></td>';
							$LISTADO_CURSOS.= '<td style="text-align: center;"><b>'.$nota.'/'.$total_eva.'</b></label></td>';
							$LISTADO_CURSOS.= '<td style="text-align: center;"><b>'.$proyeccion.'</b></label></td>';
							
							$LISTADO_CURSOS.= '<td><a href="#" class="btn_gris">ver</a></td>';
							$LISTADO_CURSOS.= '</tr>';
						}
					}
					else
					{
						$LISTADO_CURSOS.= '<tr><td colspan="4"><b>Usted no tiene cursos inscritos.</b></td></tr>';
					}

					if($listadoAgenda)
					{

						for($i=0;$i<count($listadoAgenda);$i++)
						{
							$idsesion	=	$listadoAgenda[$i][0];
							$nombresesion		= 	$listadoAgenda[$i][1];
							$sesion  = 	$listadoAgenda[$i][2];
							$evaluacion  = 	$listadoAgenda[$i][3];
							$nombrecurso  = 	$listadoAgenda[$i][4];
							$seccion  = 	$listadoAgenda[$i][5];
							
							//BOTON DE AULA
							$LISTADO_AGENDA.= '<tr>';
							$LISTADO_AGENDA.= '<td style="width:550px;">'.$nombrecurso.'-'.$seccion.'</td>';
							$LISTADO_AGENDA.= '<td style="text-align: center;"><b>'.$nombresesion.'</b></label></td>';
							$LISTADO_AGENDA.= '<td style="text-align: center;"><b>'.$sesion.'</b></label></td>';
							$LISTADO_AGENDA.= '<td><a href="#" class="btn_gris">ver</a></td>';
							$LISTADO_AGENDA.= '</tr>';
							
							if($evaluacion)
							{
								$LISTADO_AGENDA_EVALUACION.= '<tr>';
								$LISTADO_AGENDA_EVALUACION.= '<tr>';
								$LISTADO_AGENDA_EVALUACION.= '<td style="width:550px;">'.$nombrecurso.'-'.$seccion.'</td>';
								$LISTADO_AGENDA_EVALUACION.= '<td style="text-align: center;"><b>'.$evaluacion.'</b></label></td>';
								$LISTADO_AGENDA_EVALUACION.= '<td style="text-align: center;"><b>'.$sesion.'</b></label></td>';
								$LISTADO_AGENDA_EVALUACION.= '<td><a href="#" class="btn_gris">ver</a></td>';
								$LISTADO_AGENDA_EVALUACION.= '</tr>';
							
							}
						}
					}
					else
					{
						$LISTADO_AGENDA.= '<tr><td colspan="4"><b>Usted no tiene eventos para esta semana.</b></td></tr>';
						$LISTADO_AGENDA_EVALUACION.= '<tr><td colspan="4"><b>Usted no tiene evaluaciones para esta semana.</b></td></tr>';
					}
					//$lcTemplate  			= $lobjUtil->ActualizarDatosHtml($Vista_Template, $laDatos_Usuario);
					
					$CUERPO	=	file_get_contents(VISTA.'/app/escritorio.html');
					$laDatos_Vista	=array('LISTADO_CURSOS'   =>$LISTADO_CURSOS,
											'LISTADO_AGENDA'   =>$LISTADO_AGENDA,
											'LISTADO_AGENDA_EVALUACION'   =>$LISTADO_AGENDA_EVALUACION,
											'Nombre_Estudiante'=>$_SESSION['nombreusuario'].' '.$_SESSION['apellidousuario'],
											'Cedula_Estudiante'	=>$_SESSION['cedulausu']
								);
					$HTML		=	str_replace('{CUERPO}', $CUERPO, $Vista_Template);
					$HTML		=	$lobjUtil->ActualizarDatosHtml($HTML, $laDatos_Vista);
					print($HTML);
				}
				elseif($_SESSION['rol']=='1')
				{	
					$listadoCurso   =  $lobjCurso->estadisticasCurso($_SESSION['cedulausu']);
					$listadoAgenda   =  $lobjCurso->agendaProfesor($listadoCurso,$_SESSION['semana']);

					if($listadoCurso)
					{
						for($i=0;$i<count($listadoCurso);$i++)
						{
							$nombre_curso	=	$listadoCurso[$i][0];
							$seccion  = 	$listadoCurso[$i][1];
							$asistencia  = 	$listadoCurso[$i][2];
							$sesiones_ejecutadas  = 	$listadoCurso[$i][3];
							$total_estudiantes  = 	$listadoCurso[$i][4];
							$total_calificacion  = 	$listadoCurso[$i][5];
							$total_peso  = 	$listadoCurso[$i][6];
							$num_eva  = 	$listadoCurso[$i][7];
							$idcurso  = 	$listadoCurso[$i][8];

							if(!$asistencia)
								$asistencia=0;
							if(!$sesiones_ejecutadas)
								$sesiones_ejecutadas=0;
							if(!$total_estudiantes)
								$total_estudiantes=0;
							if(!$total_calificacion)
								$total_calificacion=0;
							if(!$total_peso)
								$total_peso=0;
							if(!$num_eva)
								$num_eva=0;

							if(($total_estudiantes)==0||($sesiones_ejecutadas)==0)
							 {
								$promedio_asistencia=0;
							 }
							 else
							 {
								$promedio_asistencia=($asistencia/($sesiones_ejecutadas*$total_estudiantes))*100;
							}

							if($total_peso==0)
							 {
								$promedio_calificacion=0;
							 }
							 else
							 {
							$promedio_calificacion=($total_calificacion/$total_peso)*100;
							}
							$promedio_asistencia=number_format($promedio_asistencia, 2, ',', '');
							$promedio_calificacion=number_format($promedio_calificacion, 2, ',', '');
							//BOTON DE AULA
							$LISTADO_CURSOS.= '<tr>';
							$LISTADO_CURSOS.= '<td style="width:550px;">'.$nombre_curso.'-'.$seccion.'</td>';
							$LISTADO_CURSOS.= '<td style="text-align: center;"><b>'.$total_estudiantes.'</b></label></td>';
							$LISTADO_CURSOS.= '<td style="text-align: center;"><b>'.$promedio_asistencia.' %</b></label></td>';
							$LISTADO_CURSOS.= '<td style="text-align: center;"><b>'.$promedio_calificacion.' %</b></label></td>';
							$LISTADO_CURSOS.= '<td><a href="#" class="btn_gris" onclick="ver_avance('.$idcurso.')">ver</a></td>';
							$LISTADO_CURSOS.= '</tr>';
						}
					}
					else
					{
						$LISTADO_CURSOS.= '<tr><td colspan="5"><b>Usted no tiene cursos creados.</b></td></tr>';
					}
					//$lcTemplate  			= $lobjUtil->ActualizarDatosHtml($Vista_Template, $laDatos_Usuario);
					
					if($listadoAgenda)
					{

						for($i=0;$i<count($listadoAgenda);$i++)
						{
							$idsesion	=	$listadoAgenda[$i][0];
							$nombresesion		= 	$listadoAgenda[$i][1];
							$sesion  = 	$listadoAgenda[$i][2];
							$evaluacion  = 	$listadoAgenda[$i][3];
							$nombrecurso  = 	$listadoAgenda[$i][4];
							$seccion  = 	$listadoAgenda[$i][5];
							
							//BOTON DE AULA
							$LISTADO_AGENDA.= '<tr>';
							$LISTADO_AGENDA.= '<td style="width:550px;">'.$nombrecurso.'-'.$seccion.'</td>';
							$LISTADO_AGENDA.= '<td style="text-align: center;"><b>'.$nombresesion.'</b></label></td>';
							$LISTADO_AGENDA.= '<td style="text-align: center;"><b>'.$sesion.'</b></label></td>';
							$LISTADO_AGENDA.= '<td><a href="#" class="btn_gris">ver</a></td>';
							$LISTADO_AGENDA.= '</tr>';
							
							if($evaluacion)
							{
								$LISTADO_AGENDA_EVALUACION.= '<tr>';
								$LISTADO_AGENDA_EVALUACION.= '<tr>';
								$LISTADO_AGENDA_EVALUACION.= '<td style="width:550px;">'.$nombrecurso.'-'.$seccion.'</td>';
								$LISTADO_AGENDA_EVALUACION.= '<td style="text-align: center;"><b>'.$evaluacion.'</b></label></td>';
								$LISTADO_AGENDA_EVALUACION.= '<td style="text-align: center;"><b>'.$sesion.'</b></label></td>';
								$LISTADO_AGENDA_EVALUACION.= '<td><a href="#" class="btn_gris">ver</a></td>';
								$LISTADO_AGENDA_EVALUACION.= '</tr>';
							}
						}
					}
					else
					{
						$LISTADO_AGENDA.= '<tr><td colspan="4"><b>Usted no tiene sesiones para esta semana.</b></td></tr>';
						$LISTADO_AGENDA_EVALUACION.= '<tr><td colspan="4"><b>Usted no tiene evaluaciones para esta semana.</b></td></tr>';
					}

					$CUERPO	=	file_get_contents(VISTA.'/app/escritorio_profesor.html');
					$laDatos_Vista	=array('LISTADO_CURSOS'   =>$LISTADO_CURSOS,
											'LISTADO_AGENDA'   =>$LISTADO_AGENDA,
											'LISTADO_AGENDA_EVALUACION'   =>$LISTADO_AGENDA_EVALUACION,
											'Nombre_Estudiante'=>$_SESSION['nombreusuario'].' '.$_SESSION['apellidousuario'],
											'Cedula_Estudiante'	=>$_SESSION['cedulausu']
								);
					$HTML		=	str_replace('{CUERPO}', $CUERPO, $Vista_Template);
					$HTML		=	$lobjUtil->ActualizarDatosHtml($HTML, $laDatos_Vista);
					print($HTML);
				}
				else
				{
					
					$CUERPO		= 	file_get_contents(VISTA.'/app/index_frontino.html');
					$HTML		=	str_replace('{CUERPO}', $CUERPO, $Vista_Template);
					//$HTML		=	str_replace('{BOTONES}', $BOTONES, $HTML);
					print($HTML);
				}
				break;
		}
	}
	
	Inicio();
?>
