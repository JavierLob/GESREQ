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
	$lobjUsuario 	= new clsUsuario();
	$lobjError		= new clsIntento();
	$lobjUtil 		= new clsUtilidades();
	$lobjUtil->timeout($_SESSION["timeup"]);
*/
	require_once('../lib/constantes.php');
	require_once('../class/requerimiento.class.php');
	include_once('../lib/armar_cuerpo.php');
	$lobjRequerimiento = new clsRequerimiento;

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
	$operacion=$_SESSION['operacion'];
	unset($_SESSION['msj']);
	unset($_SESSION['titulo']);
	unset($_SESSION['operacion']);

	function Inicio(){
		global $lobjRequerimiento;
		global $Vista_Template,$titulo,$msj,$operacion;
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
					$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/registro_requerimiento.html');
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
						$ESTATUS='<span class="label label-danger"><i class="icon-remove"></i></span>';
					}
					elseif ($laRequerimientos[$i][8]=='ATENDIDO')
					{
						$ESTATUS='<span class="label label-warning"><i class="icon-cogs"></i></span>';
					}
					elseif ($laRequerimientos[$i][8]=='CERRADO')
					{
						$ESTATUS='<span class="label label-succes"><i class="icon-ok"></i></span>';						
					}
					$LISTADO_REQUERIMIENTOS.='<tr>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][0].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][1].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][2].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td >'.$laRequerimientos[$i][4].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td >'.$laRequerimientos[$i][5].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$laRequerimientos[$i][3].'</td>';
						$LISTADO_REQUERIMIENTOS.='<td>'.$ESTATUS.'</td>';
						$LISTADO_REQUERIMIENTOS.='<td ><a href="#" class="btn mini blue"> <i class="icon-edit"></i> </a> <a href="#" class="btn mini red"> <i class="icon-trash"></i> </a></td>';
						$LISTADO_REQUERIMIENTOS.='<td ><a href="?id='.$laRequerimientos[$i][0].'" class="btn mini green-stripe">Ver</a></td>';
					$LISTADO_REQUERIMIENTOS.='</tr>';
				}
				$CONTENIDO		= 	file_get_contents(VISTA.'/requerimiento/listado_requerimiento.html');
				$CONTENIDO		=	str_replace('{LISTADO_REQUERIMIENTOS}', $LISTADO_REQUERIMIENTOS, $CONTENIDO);
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
