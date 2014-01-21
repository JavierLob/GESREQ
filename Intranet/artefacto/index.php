<?php
	ini_set('display_errors',1);

	session_start();

	require_once('../class/requerimiento.class.php');
	require_once('../class/artefacto.class.php');
	require_once('../class/usuario.class.php');
	require_once("../lib/utilidades.php");
	$lobjRequerimiento = new clsRequerimiento;
	$lobjArtefacto = new clsArtefacto;
	$lobjUsuario = new clsUsuario;
	$lobjUtil = new clsUtilidades;

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
	$id=$_GET['id'];
	$msj=$_SESSION['msj'];
	$titulo=$_SESSION['titulo'];
	$operacion=$_SESSION['operacion'];
	unset($_SESSION['msj']);
	unset($_SESSION['titulo']);
	unset($_SESSION['operacion']);

	function Inicio(){
		global $lobjArtefacto,$lobjRequerimiento,$lobjUsuario,$lobjUtil;
		global $Vista_Template,$titulo,$msj,$operacion,$id;
		$lcVista = CapturarVista();
		switch($lcVista){
			case 'registro_artefacto':
				if($msj)
				{
					if($msj=='exito')
					{
						$CONTENIDO		= 	file_get_contents(VISTA.'/mensaje_exito.html');

					}
					elseif ($msj=='error') 
					{
						$CONTENIDO		= 	file_get_contents(VISTA.'/mensaje_error.html');
					}
					$CONTENIDO		=	str_replace('{TITULO}', $titulo, $CONTENIDO);
					$CONTENIDO		=	str_replace('{OPERACION}', $operacion, $CONTENIDO);
				}
				else
				{
					$lobjUsuario->Lista_Usuario();
					$laUsuario=$lobjUsuario->get_Arreglo();
					for($i=0;$i<count($laUsuario);$i++)
					{
						$USUARIOS.='<option value="'.$laUsuario[$i][0].'">'.$laUsuario[$i][2].' '.$laUsuario[$i][1].'</option>';
					}

					$laRequerimientos=$lobjRequerimiento->listar_requerimientos();
					for($i=0;$i<count($laRequerimientos);$i++)
					{
						$REQUERIMIENTOS.='<option value="'.$laRequerimientos[$i][0].'"'; if($laRequerimiento[10]==$laRequerimientos[$i][0]){;$REQUERIMIENTOS.='selected';} $REQUERIMIENTOS.='>'.$laRequerimientos[$i][2].' | '.$laRequerimientos[$i][1].'</option>';
					}

					$Datos_requerimiento	=array(	'USUARIOS'			=>$USUARIOS,						
								'REQUERIMIENTOS'			=>$REQUERIMIENTOS
								);
					$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/registro_requerimiento.html');
					$CONTENIDO = $lobjUtil->ActualizarDatosHtml($CONTENIDO, $Datos_requerimiento);
				}
					$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
				print($HTML);
			break;
			case 'listado_artefacto':

				$laArtefactos=$lobjArtefacto->listar_artefactos();
				for($i=0;$i<count($laArtefactos);$i++)
				{
					$lobjRequerimiento->set_IdRequerimiento($laArtefactos[$i][1]);
					$laRequerimiento=$lobjRequerimiento->consultar_requerimiento();
					
					$LISTADO_ARTEFACTOS.='<tr>';
						$LISTADO_ARTEFACTOS.='<td>'.$laArtefactos[$i][0].'</td>';
						$LISTADO_ARTEFACTOS.='<td>'.$laRequerimiento[1].' | '.$laRequerimiento[2].'</td>';
						$LISTADO_ARTEFACTOS.='<td>'.$laArtefactos[$i][2].'</td>';
						$LISTADO_ARTEFACTOS.='<td>'.$laArtefactos[$i][3].'</td>';
						$LISTADO_ARTEFACTOS.='<td >'.$laArtefactos[$i][4].'</td>';
						$LISTADO_ARTEFACTOS.='<td ><img alt="'.$laArtefactos[$i][5].'" title="'.$laArtefactos[$i][5].'" width="29px" height="29px" src="../media/img/foto/'.$laArtefactos[$i][5].'.jpg" /></td>';
						$LISTADO_ARTEFACTOS.='<td ><a href="?q=modificar_artefacto&id='.$laArtefactos[$i][0].'" class="btn mini blue"> <i class="icon-edit" title="Editar artefacto"></i> </a> <a href="#" class="btn mini red" title="Eliminar artefacto"> <i class="icon-trash"></i> </a> <a href="../requerimiento/?q=artefacto_requerimiento&id='.$laArtefactos[$i][1].'" class="btn mini green" title="Subir artefacto"> <i class="icon-upload-alt"></i> </a></td>';
						$LISTADO_ARTEFACTOS.='<td ><a href="?q=consultar_artefacto&id='.$laArtefactos[$i][0].'" class="btn mini green-stripe">Ver</a></td>';
					$LISTADO_ARTEFACTOS.='</tr>';
				}
				$CONTENIDO		= 	file_get_contents(VISTA.'/artefacto/listado_artefacto.html');
				$CONTENIDO		=	str_replace('{LISTADO_ARTEFACTOS}', $LISTADO_ARTEFACTOS, $CONTENIDO);
				$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
				print($HTML);

			break;
			case 'modificar_requerimiento':
				if($msj)
				{
					if($msj=='exito')
					{
						$CONTENIDO		= 	file_get_contents(VISTA.'/mensaje_exito.html');

					}
					elseif ($msj=='error') 
					{
						$CONTENIDO		= 	file_get_contents(VISTA.'/mensaje_error.html');
					}
					$CONTENIDO		=	str_replace('{TITULO}', $titulo, $CONTENIDO);
					$CONTENIDO		=	str_replace('{OPERACION}', $operacion, $CONTENIDO);
				}
				else
				{	
					include('../lib/datos_requerimiento.php');

					$Datos_requerimiento	=array(	'ID'			=>$ID,
								'CODIGO'			=>$CODIGO,
								'TITULO'			=>$TITULO,
								'USUARIOS'			=>$USUARIOS,
								'PRIORIDAD'			=>$PRIORIDAD,
								'TIPO'			=>$TIPO,
								'DIFICULTAD'			=>$DIFICULTAD,
								'REQUERIMIENTOS'			=>$REQUERIMIENTOS,
								'DESCRIPCION'			=>$DESCRIPCION
								);

					$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/modificar_requerimiento.html');
					$CONTENIDO = $lobjUtil->ActualizarDatosHtml($CONTENIDO, $Datos_requerimiento);
				}
					$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
				print($HTML);
			break;
			case 'consultar_requerimiento':				
					include('../lib/datos_requerimiento.php');

					$lobjRequerimiento->set_IdRequerimiento($laRequerimiento[10]);
					$requePadre=$lobjRequerimiento->consultar_requerimiento();
					if($requePadre==''){$requePadre='No aplica';}else{$requePadre=$requePadre[2].' | '.$requePadre[1];}
					
					$Datos_requerimiento	=array(	'ID'			=>$ID,
								'CODIGO'			=>$CODIGO,
								'TITULO'			=>$TITULO,
								'USUARIOS'			=>$laRequerimiento[9],
								'PRIORIDAD'			=>$laRequerimiento[4],
								'TIPO'			=>$laRequerimiento[3],
								'DIFICULTAD'			=>$laRequerimiento[5],
								'ESTATUS'			=>$laRequerimiento[8],
								'REQUERIMIENTOS'			=>$requePadre,
								'DESCRIPCION'			=>$DESCRIPCION
								);

					$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/consultar_requerimiento.html');
					$CONTENIDO = $lobjUtil->ActualizarDatosHtml($CONTENIDO, $Datos_requerimiento);
					$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
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
