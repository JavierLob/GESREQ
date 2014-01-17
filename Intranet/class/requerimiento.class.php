<?php
require_once("../nucleo/ModelBD.php");

class clsRequerimiento extends clsModel
{
	private $lnIdRequerimiento;
	private $lcCodigo;
	private $lcTitulo;
	private $lcTipo;
	private $lcPrioridad;
	private $lcDificultad;
	private $lcDescripcion;
	private $ldFechaReg;
	private $ldFechaAct;
	private $ldFechaFin;
	private $lcResponsable;

	public function set_IdRequerimiento($pnIdRequerimiento)
	{
		$this->lnIdRequerimiento=$pnIdRequerimiento;
	}

	public function set_Codigo($pcCodigo)
	{
		$this->lcCodigo=$pcCodigo;
	}

	public function set_Titulo($pcTitulo)
	{
		$this->lcTitulo=$pcTitulo;
	}

	public function set_Tipo($pcTipo)
	{
		$this->lcTipo=$pcTipo;
	}

	public function set_Prioridad($pcPrioridad)
	{
		$this->lcPrioridad=$pcPrioridad;
	}

	public function set_Dificultad($pcDificultad)
	{
		$this->lcDificultad=$pcDificultad;
	}


	public function set_Descripcion($pcDescripcion)
	{
		$this->lcDescripcion=$pcDescripcion;
	}

	public function set_FechaReg($pdFechaReg)
	{
		$this->ldFechaReg=$pdFechaReg;
	}

	public function set_FechaAct($pdFechaAct)
	{
		$this->ldFechaAct=$pdFechaAct;
	}

	public function set_FechaFin($pdFechaFin)
	{
		$this->ldFechaFin=$pdFechaFin;
	}

	public function set_Responsable($pcResponsable)
	{
		$this->lcResponsable=$pcResponsable;
	}

	public function registrar()
	{
		$this->conectar();
		$lcSql="INSERT INTO trequerimiento (codigo,titulo,tipo,prioridad,dificultad,descripcion,fechareg,idresponsable)VALUES('$this->lcCodigo','$this->lcTitulo','$this->lcTipo','$this->lcPrioridad','$this->lcDificultad','$this->lcDescripcion',CURRENT_DATE(),'$this->lcResponsable')";
		$llHecho=$this->ejecutar($lcSql);
		$this->desconectar();
		return $llHecho;
	}
	
	public function listar_requerimientos()
	{
		$this->conectar();
		$lcSql="SELECT *,date_format(fechareg,'%d-%m-%Y')as fechareg FROM trequerimiento;";
		$lrTb=$this->filtro($lcSql);
		$cont=0;
		while($laRow=$this->proximo($lrTb))
		{
				$lafilas[$cont][0] = $laRow["idrequerimiento"];
				$lafilas[$cont][1] = $laRow["codigo"];
				$lafilas[$cont][2] = $laRow["titulo"];
				$lafilas[$cont][3] = $laRow["tipo"];
				$lafilas[$cont][4] = $laRow["prioridad"];
				$lafilas[$cont][5] = $laRow["dificultad"];
				$lafilas[$cont][6] = $laRow["descripcion"];
				$lafilas[$cont][7] = $laRow["fechareg"];
				$lafilas[$cont][8] = $laRow["estatus"];
				$lafilas[$cont][9] = $laRow["idresponsable"];
				$cont++;
		}
		$this->cierrafiltro($lrTb);
		$this->desconectar();
		return $lafilas;
	}

}
?>