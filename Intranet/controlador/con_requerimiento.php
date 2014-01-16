<?php
	include('../class/requerimiento.class.php');
	$lobjRequerimiento = new clsRequerimiento;

	$lnIdRequerimiento= $_POST['idrequerimiento'];
	$lcCodigo= $_POST['codigo'];
	$lcNombre= $_POST['nombre'];
	$lcTipo= $_POST['tipo'];
	$lcPrioridad= $_POST['prioridad'];
	$lcDificultad = $_POST['dificultad'];
	$lcObjetivo= $_POST['objetivo'];
	$lcDescripcion= $_POST['descripcion'];
	$ldFechaReg= $_POST['fechareg'];
	$ldFechaAct= $_POST['fechaact'];
	$ldFechaFin= $_POST['fechafin'];
	$lcOperacion= $_POST['operacion'];

	$lobjRequerimiento->set_IdRequerimiento($lnIdRequerimiento);
	$lobjRequerimiento->set_Codigo($lcCodigo);
	$lobjRequerimiento->set_Nombre($lcNombre);
	$lobjRequerimiento->set_Tipo($lcTipo);
	$lobjRequerimiento->set_Prioridad($lcPrioridad);
	$lobjRequerimiento->set_Dificultad($lcDificultad);
	$lobjRequerimiento->set_Objetivo($lcObjetivo);
	$lobjRequerimiento->set_Descripcion($lcDescripcion);
	$lobjRequerimiento->set_FechaReg($ldFechaReg);
	$lobjRequerimiento->set_FechaAct($ldFechaAct);
	$lobjRequerimiento->set_FechaFin($ldFechaFin);

	switch ($lcOperacion) {
		case 'registrar':
				$llHecho=$lobjRequerimiento->registrar();

				$_SESSION['titulo']='Registro de requerimientos';
				if($llHecho)
				{
					$_SESSION['msj']='exito';
				}
				else
				{
					$_SESSION['msj']='error';
				}
					header('location: ../requerimiento/?q=registro_requerimiento');
			break;
		case 'modificar':
			# code...
			break;
		case 'actualizar':
			# code...
			break;
		default:
			# code...
			break;
	}
?>