<?php
	ini_set('display_errors',1);

	session_start();

	require_once('../class/requerimiento.class.php');
	require_once('../class/usuario.class.php');
	require_once("../lib/utilidades.php");
	$lobjRequerimiento = new clsRequerimiento;
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
		global $lobjRequerimiento,$lobjUsuario,$lobjUtil;
		global $Vista_Template,$titulo,$msj,$operacion,$id;
		$lcVista = CapturarVista();
		switch($lcVista){
			case 'registro_requerimiento':
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
					$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/registro_requerimiento.html');
					$CONTENIDO		=	str_replace('{USUARIOS}', $USUARIOS, $CONTENIDO);
				}
					$HTML		=	str_replace('{CONTENIDO}', $CONTENIDO, $Vista_Template);
				print($HTML);
			break;
			case 'listado_requerimiento':

				$laRequerimientos=$lobjRequerimiento->listar_requerimientos();
				for($i=0;$i<count($laRequerimientos);$i++)
				{
					$ESTATUS='';
					if($laRequerimientos[$i][8]=='ABIERTO')
					{
						$ESTATUS='<span title="Requerimiento ABIERTO" class="label label-important"><i class="icon-remove"></i></span>';
					}
					elseif ($laRequerimientos[$i][8]=='ATENDIDO')
					{
						$ESTATUS='<span title="Requerimiento ATENDIDO" class="label label-warning"><i class="icon-cogs"></i></span>';
					}
					elseif ($laRequerimientos[$i][8]=='CERRADO')
					{
						$ESTATUS='<span title="Requerimiento CERRADO" class="label label-succes"><i class="icon-ok"></i></span>';						
					}
					$LISTADO_REQUERIMIENTOS.='<tr>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][0].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][1].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][2].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td >'.$laRequerimientos[$i][4].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][3].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$ESTATUS.'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][7].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td ><img alt="'.$laRequerimientos[$i][9].'" title="'.$laRequerimientos[$i][9].'" width="29px" height="29px" src="../media/img/foto/'.$laRequerimientos[$i][9].'.jpg" /></td>';
						$LISTADO_REQUERIMIENTOS.='<td ><a href="#" class="btn mini yellow"> <i class="icon-refresh" title="Actualizar requerimiento"></i> </a> <a href="?q=modificar_requerimiento&id='.$laRequerimientos[$i][0].'" class="btn mini blue"> <i class="icon-edit" title="Editar requerimiento"></i> </a> <a href="#" class="btn mini red" title="Eliminar requerimiento"> <i class="icon-trash"></i> </a> <a href="#" class="btn mini green" title="Subir artefacto"> <i class="icon-upload-alt"></i> </a></td>';
						$LISTADO_REQUERIMIENTOS.='<td ><a href="?id='.$laRequerimientos[$i][0].'" class="btn mini green-stripe">Ver</a></td>';
					$LISTADO_REQUERIMIENTOS.='</tr>';
				}
				$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/listado_requerimiento.html');
				$CONTENIDO		=	str_replace('{LISTADO_REQUERIMIENTOS}', $LISTADO_REQUERIMIENTOS, $CONTENIDO);
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
					$lobjRequerimiento->set_IdRequerimiento($id);
					$laRequerimiento=$lobjRequerimiento->consultar_requerimiento();

					$ID=$laRequerimiento[0];
					$CODIGO= $laRequerimiento[1];
					$TITULO= $laRequerimiento[2];
					$DESCRIPCION = $laRequerimiento[6];

					$PRIORIDAD.='<option value="Baja"';if($laRequerimiento[4]=="Baja"){$PRIORIDAD.='selected';}$PRIORIDAD.='>Baja</option>';
					$PRIORIDAD.='<option value="Media"';if($laRequerimiento[4]=="Media"){$PRIORIDAD.='selected';}$PRIORIDAD.='>Media</option>';
					$PRIORIDAD.='<option value="Alta"';if($laRequerimiento[4]=="Alta"){$PRIORIDAD.='selected';}$PRIORIDAD.='>Alta</option>';
                    

                    $TIPO.='<label class="radio">';
                    $TIPO.='<input type="radio" name="tipo" value="Funcional" ';if($laRequerimiento[3]=="Funcional"){ $TIPO.='checked';} $TIPO.=' />';
                    $TIPO.='Funcional';
                   $TIPO.=' </label>';
                    $TIPO.='<label class="radio">';
                    $TIPO.='<input type="radio" name="tipo" value="No Funcional" ';if($laRequerimiento[3]=="No Funcional"){ $TIPO.='checked'; } $TIPO.='/>';
                    $TIPO.='No Funcional';
                    $TIPO.='</label>';

					$DIFICULTAD.='<option value="Baja"';if($laRequerimiento[5]=="Baja"){$DIFICULTAD.='selected';}$DIFICULTAD.='>Baja</option>';
					$DIFICULTAD.='<option value="Media"';if($laRequerimiento[5]=="Media"){$DIFICULTAD.='selected';}$DIFICULTAD.='>Media</option>';
					$DIFICULTAD.='<option value="Alta"';if($laRequerimiento[5]=="Alta"){$DIFICULTAD.='selected';}$DIFICULTAD.='>Alta</option>';
                    
                    $lobjUsuario->Lista_Usuario();
					$laUsuario=$lobjUsuario->get_Arreglo();
					for($i=0;$i<count($laUsuario);$i++)
					{
						$USUARIOS.='<option value="'.$laUsuario[$i][0].'"'; if($laRequerimiento[9]==$laUsuario[$i][0]){;$USUARIOS.='selected';} $USUARIOS.='>'.$laUsuario[$i][2].' '.$laUsuario[$i][1].'</option>';
					}
					
					$Datos_requerimiento	=array(	'ID'			=>$ID,
								'CODIGO'			=>$CODIGO,
								'TITULO'			=>$TITULO,
								'USUARIOS'			=>$USUARIOS,
								'PRIORIDAD'			=>$PRIORIDAD,
								'TIPO'			=>$TIPO,
								'DIFICULTAD'			=>$DIFICULTAD,
								'DESCRIPCION'			=>$DESCRIPCION
								);	

					$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/modificar_requerimiento.html');
					$CONTENIDO = $lobjUtil->ActualizarDatosHtml($CONTENIDO, $Datos_requerimiento);
				}
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
