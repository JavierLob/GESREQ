<?php
require_once("../nucleo/ModelBD.php");

class clsArtefacto extends clsModel
{
	private $lnIdArtefacto;
	private $lnIdRequerimiento;
	private $lcNombre;
	private $lcTipo;
	private $lcExtension;
	private $ldFecha;
	private $lcResponsable;

	public function set_IdArtefacto($pnIdArtefacto)
	{
		$this->lnIdArtefacto=$pnIdArtefacto;
	}

	public function set_IdRequerimiento($pnIdRequerimiento)
	{
		$this->lnIdRequerimiento=$pnIdRequerimiento;
	}

	public function set_Nombre($pcNombre)
	{
		$this->lcNombre=$pcNombre;
	}

	public function set_Tipo($pcTipo)
	{
		$this->lcTipo=$pcTipo;
	}

	public function set_Extension($pcExtension)
	{
		$this->lcExtension=$pcExtension;
	}


	public function set_Fecha($pdFecha)
	{
		$this->ldFecha=$pdFecha;
	}

	public function set_Responsable($pcResponsable)
	{
		$this->lcResponsable=$pcResponsable;
	}

	public function registrar()
	{
		$this->conectar();
		$lcSql="INSERT INTO tartefacto (nombre,extension,fecha,idusuario,idrequerimiento)VALUES('$this->lcNombre','$this->lcExtension',CURRENT_DATE(),'$this->lcResponsable','$this->lnIdRequerimiento')";
		$llHecho=$this->ejecutar($lcSql);
		$this->desconectar();
		return $llHecho;
	}
	
	public function listar_artefactos()
	{
		$this->conectar();
		$lcSql="SELECT *,date_format(fecha,'%d-%m-%Y')as fecha FROM tartefacto;";
		$lrTb=$this->filtro($lcSql);
		$cont=0;
		while($laRow=$this->proximo($lrTb))
		{
				$lafilas[$cont][0] = $laRow["idartefacto"];
				$lafilas[$cont][1] = $laRow["idrequerimiento"];
				$lafilas[$cont][2] = $laRow["nombre"];
				$lafilas[$cont][3] = $laRow["extension"];
				$lafilas[$cont][4] = $laRow["fecha"];
				$lafilas[$cont][5] = $laRow["idusuario"];
				$cont++;
		}
		$this->cierrafiltro($lrTb);
		$this->desconectar();
		return $lafilas;
	}

	public function consultar_requerimiento()
	{
		$this->conectar();
		$lcSql="SELECT *,date_format(fechareg,'%d-%m-%Y')as fechareg FROM trequerimiento WHERE idrequerimiento='$this->lnIdRequerimiento'";
		$lrTb=$this->filtro($lcSql);
		$cont=0;
		while($laRow=$this->proximo($lrTb))
		{
				$lafila[0] = $laRow["idrequerimiento"];
				$lafila[1] = $laRow["codigo"];
				$lafila[2] = $laRow["titulo"];
				$lafila[3] = $laRow["tipo"];
				$lafila[4] = $laRow["prioridad"];
				$lafila[5] = $laRow["dificultad"];
				$lafila[6] = $laRow["descripcion"];
				$lafila[7] = $laRow["fechareg"];
				$lafila[8] = $laRow["estatus"];
				$lafila[9] = $laRow["idresponsable"];
				$lafila[10] = $laRow["requepadre"];
				$cont++;
		}
		$this->cierrafiltro($lrTb);
		$this->desconectar();
		return $lafila;
	}

	public function modificar()
	{
		$this->conectar();
		$lcSql="UPDATE trequerimiento SET codigo='$this->lcCodigo',titulo='$this->lcTitulo',tipo='$this->lcTipo',prioridad='$this->lcPrioridad',dificultad='$this->lcDificultad',descripcion='$this->lcDescripcion',idresponsable='$this->lcResponsable',requepadre='$this->lnRequePadre' WHERE idrequerimiento='$this->lnIdRequerimiento' ";
		$llHecho=$this->ejecutar($lcSql);
		$this->desconectar();
		return $llHecho;
	}

	public function actualizar()
	{
		$this->conectar();
		$idpersona=$_SESSION['cedulausu'];
		$lcSql="UPDATE trequerimiento SET estatus='$this->lcEstatus',descripcion='$this->lcDescripcion',fechaact=CURRENT_DATE() WHERE idrequerimiento='$this->lnIdRequerimiento' ";
		$llHecho=$this->ejecutar($lcSql);
		$lcSql="INSERT INTO thistorial( idrequerimiento, idpersona, descripcion)VALUES('$this->lnIdRequerimiento','$idpersona','$this->lcComentario')";
		$llHecho=$this->ejecutar($lcSql);
		$this->desconectar();
		return $llHecho;
	}

	public function eliminar()
	{
		$this->conectar();
		$lcSql="DELETE FROM trequerimiento WHERE idrequerimiento='$this->lnIdRequerimiento' ";
		$llHecho=$this->ejecutar($lcSql);
		$this->desconectar();
		return $llHecho;
	}

}
?>