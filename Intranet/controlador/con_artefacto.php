<?php
	session_start();
	include('../class/artefacto.class.php');
	$lobjArtefacto = new clsArtefacto;

	$lnIdArtefacto= $_POST['idartefacto'];
	$lnIdRequerimiento= $_POST['idrequerimiento'];
	$lcNombre= $_POST['nombre'];
	$lcTipo= $_POST['tipo'];
	$ldFecha= $_POST['fecha'];
	$lcResponsable= $_POST['responsable'];
	$lcOperacion= $_POST['operacion'];

	$lobjArtefacto->set_IdArtefacto($lnIdArtefacto);
	$lobjArtefacto->set_IdRequerimiento($lnIdRequerimiento);
	$lobjArtefacto->set_Nombre($lcNombre);
	$lobjArtefacto->set_Tipo($lcTipo);
	$lobjArtefacto->set_Fecha($ldFecha);
	$lobjArtefacto->set_Responsable($lcResponsable);

	switch ($lcOperacion) {
		case 'registrar':
				$arrayreempla=array("/","");
		
				$i=0;
				foreach($lcNombre as $valor)
				{
					$arreglo['nombre'][$i]=$valor;
					$i++;
				}

				foreach ($_FILES['archivo'] as $key => $value)
				{		
					$i=0;		
					foreach($_FILES['archivo'][$key] as $valor)
					{
						$arreglo[$key][$i]=$valor;
						$i++;
					}
				}
					

				$targetPath ='../artefactos/';
				for($j=0;$j<$i;$j++)
				{
					$archivo= str_replace($arrayreempla," ", $arreglo['name'][$j]);
					
					$tempFile = $arreglo['tmp_name'][$j];
					$tipo= explode(".", $archivo);
					$lcExtension = end($tipo);
					$nombre= time(). "-" . $archivo;
					$descrip= $_REQUEST['des'];
					$targetFile = str_replace("//", "/", $targetPath) . $nombre;		
					if(copy($tempFile, $targetFile))
					{
						$lobjArtefacto->set_Nombre($arreglo['nombre'][$j]);
						$lobjArtefacto->set_Archivo($nombre);
						$lobjArtefacto->set_Extension($lcExtension);
						$lobjArtefacto->set_Responsable($_SESSION['idusuario']);

						$llHecho=$lobjArtefacto->registrar();
						$_SESSION['titulo']='Artefacto requerimientos';
						if($llHecho)
						{
							$_SESSION['msj']='exito';
							$_SESSION['operacion']='El/Los artefacto/s se registró/aron con éxito.';
							
						}
						else
						{
							$_SESSION['msj']='error';
							$_SESSION['operacion']='El/Los artefacto/s no pudo ser registrado.';
						}
					}
				}


				header('location: ../artefacto/?q=registro_artefacto');
		break;
		case 'modificar':
			$llHecho=$lobjArtefacto->modificar();

				$_SESSION['titulo']='Modificar artefactos';
				if($llHecho)
				{
					$_SESSION['msj']='exito';
					$_SESSION['operacion']='El artefacto se modificó con éxito.';
				}
				else
				{
					$_SESSION['msj']='error';
					$_SESSION['operacion']='El artefacto no pudo ser modificado.';
				}
					header('location: ../artefacto/?q=modificar_artefacto');
		break;
		case 'eliminar':
			$llHecho=$lobjArtefacto->eliminar();

				$_SESSION['titulo']='Eliminar artefacto';
				if($llHecho)
				{
					$_SESSION['msj']='exito';
					$_SESSION['operacion']='El artefacto se eliminó con éxito.';
				}
				else
				{
					$_SESSION['msj']='error';
					$_SESSION['operacion']='El artefacto no pudo ser eliminado.';
				}
					header('location: ../artefacto/?q=eliminar_artefacto');
			break;
		default:
			# code...
			break;
	}
?>