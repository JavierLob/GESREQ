<?php
require_once("../nucleo/ModelBD.php");

class clsRequerimiento extends clsModel
{
	private $lnIdRequerimiento;
	private $lcCodigo;
	private $lcNombre;
	private $lcTipo;
	private $lcPrioridad;
	private $lcDificultad;
	private $lcObjetivo;
	private $lcDescripcion;
	private $ldFechaReg;
	private $ldFechaAct;
	private $ldFechaFin;

	protected function set_IdRequerimiento($pnIdRequerimiento)
	{
		$lnIdRequerimiento=$pnIdRequerimiento;
	}

	protected function set_Codigo($pcCodigo)
	{
		$lcCodigo=$pcCodigo;
	}

	protected function set_Nombre($pcNombre)
	{
		$lcNombre=$pcNombre;
	}

	protected function set_Tipo($pcTipo)
	{
		$lcTipo=$pcTipo;
	}

	protected function set_Prioridad($pcPrioridad)
	{
		$lcPrioridad=$pcPrioridad;
	}

	protected function set_Dificultad($pcDificultad)
	{
		$lcDificultad=$pcDificultad;
	}

	protected function set_Objetivo($pcObjetivo)
	{
		$lcObjetivo=$pcObjetivo;
	}

	protected function set_Descripcion($pcDescripcion)
	{
		$lcDescripcion=$pcDescripcion;
	}

	protected function set_FechaReg($pdFechaReg)
	{
		$ldFechaReg=$pdFechaReg;
	}

	protected function set_FechaAct($pdFechaAct)
	{
		$ldFechaAct=$pdFechaAct;
	}

	protected function set_FechaFin($pdFechaFin)
	{
		$ldFechaFin=$pdFechaFin;
	}

}
?>