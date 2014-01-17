<?php
	session_start();
	include('../class/requerimiento.class.php');
	$lobjRequerimiento = new clsRequerimiento;

	$lnIdRequerimiento= $_POST['idrequerimiento'];
	$lcCodigo= $_POST['codigo'];
	$lcTitulo= $_POST['titulo'];
	$lcTipo= $_POST['tipo'];
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