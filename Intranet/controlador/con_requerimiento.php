<?php
	session_start();
	include('../class/requerimiento.class.php');
	$lobjRequerimiento = new clsRequerimiento;

	$lnIdRequerimiento= $_POST['idrequerimiento'];
	$lcCodigo= $_POST['codigo'];
	$lcTitulo= $_POST['titulo'];
	$lcTipo= $_POST['tipo'];
	$lnRequePadre= $_POST['requepadre'];
	$lcPrioridad= $_POST['prioridad'];
	$lcDificultad = $_POST['dificultad'];
	$lcDescripcion= $_POST['descripcion'];
	$ldFechaReg= $_POST['fechareg'];
	$ldFechaAct= $_POST['fechaact'];
	$ldFechaFin= $_POST['fechafin'];
	$lcResponsable= $_POST['responsable'];
	$lcOperacion= $_POST['operacion'];

	$lobjRequerimiento->set_IdRequerimiento($lnIdRequerimiento);
	$lobjRequerimiento->set_Codigo($lcCodigo);
	$lobjRequerimiento->set_Titulo($lcTitulo);
	$lobjRequerimiento->set_Tipo($lcTipo);
	$lobjRequerimiento->set_RequePadre($lnRequePadre);
	$lobjRequerimiento->set_Prioridad($lcPrioridad);
	$lobjRequerimiento->set_Dificultad($lcDificultad);
	$lobjRequerimiento->set_Descripcion($lcDescripcion);
	$lobjRequerimiento->set_FechaReg($ldFechaReg);
	$lobjRequerimiento->set_FechaAct($ldFechaAct);
	$lobjRequerimiento->set_FechaFin($ldFechaFin);
	$lobjRequerimiento->set_Responsable($lcResponsable);

	switch ($lcOperacion) {
		case 'registrar':
				$llHecho=$lobjRequerimiento->registrar();

				$_SESSION['titulo']='Registro de requerimientos';
				if($llHecho)
				{
					$_SESSION['msj']='exito';
					$_SESSION['operacion']='El requerimiento se registró con exito.';
				}
				else
				{
					$_SESSION['msj']='error';
					$_SESSION['operacion']='El requerimiento no pudo ser registrado.';
				}
					header('location: ../requerimiento/?q=registro_requerimiento');
		break;
		case 'modificar':
			$llHecho=$lobjRequerimiento->modificar();

				$_SESSION['titulo']='Modificar requerimientos';
				if($llHecho)
				{
					$_SESSION['msj']='exito';
					$_SESSION['operacion']='El requerimiento se modificó con exito.';
				}
				else
				{
					$_SESSION['msj']='error';
					$_SESSION['operacion']='El requerimiento no pudo ser modificado.';
				}
					header('location: ../requerimiento/?q=modificar_requerimiento');
		break;
		case 'eliminar':
			$llHecho=$lobjRequerimiento->eliminar();

				$_SESSION['titulo']='Eliminar requerimiento';
				if($llHecho)
				{
					$_SESSION['msj']='exito';
					$_SESSION['operacion']='El requerimiento se eliminó con exito.';
				}
				else
				{
					$_SESSION['msj']='error';
					$_SESSION['operacion']='El requerimiento no pudo ser eliminado.';
				}
					header('location: ../requerimiento/?q=eliminar_requerimiento');
			break;
		default:
			# code...
			break;
	}
?>