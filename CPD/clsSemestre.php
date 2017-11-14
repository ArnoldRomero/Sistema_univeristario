<?php
include_once('clsConexion.php');
class CarreraMateria extends Conexion
{
	//atributos
	private $cod_carrera;
	private $sigla;
	private $semestre;

	//construtor
	public function CarreraMateria()
	{   parent::conexion();
		$this->cod_carrera="";
		$this->sigla="";
		$this->semestre="";	
	}

	public function setCodCarrera($valor)
	{
		$this->cod_carrera=$valor;
	}
	public function getCodCarrera()
	{
		return $this->cod_carrera;
	}
	//CODIGO DEL PROFESOR
	public function setSigla($valor)
	{
		$this->sigla=$valor;
	}
	public function getSigla()
	{
		return $this->sigla;
	}
	//SEMESTRE
	public function setSemestre($valor)
	{
		$this->semestre=$valor;
	}
	public function getSemestre()
	{
		return $this->semestre;
	}



	public function guardar()
	{
     $sql="INSERT INTO matcar (cod_carrera_f,sigla_f,semestre) VALUES('$this->cod_carrera','$this->sigla','$this->semestre')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
		$sql="UPDATE matcar SET  semestre='$this->semestre' WHERE sigla_f='$this->sigla' and cod_carrera_f='$this->cod_carrera'";
		if (parent::ejecutar($sql)) {
			return true;
		}
		else
		{
			return false;
		}
	}

		

	public function eliminar()
	{
		$sql="DELETE FROM matcar WHERE cod_carrera_f='$this->cod_carrera' AND sigla_f='$this->sigla' ";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM carrera, matcar, materia WHERE carrera.cod_carrera=matcar.cod_carrera_f AND matcar.sigla_f=materia.sigla  ORDER BY nombre_c ASC, semestre ASC ";
		return parent::ejecutar($sql);
	}


	public function buscarxParametros($carrera,$semestre,$materia)
	{
		$sql="SELECT * FROM carrera, matcar, materia WHERE carrera.cod_carrera=matcar.cod_carrera_f AND matcar.sigla_f=materia.sigla AND  nombre_c like '%$carrera%' AND semestre like '%$semestre%' AND nombre_m like '%$materia%' ORDER BY semestre ASC ";
		return parent::ejecutar($sql);
	}

	public function buscar2($carrera,$semestre,$materia)
	{
		$sql="SELECT * FROM carrera, matcar, materia WHERE carrera.cod_carrera=matcar.cod_carrera_f AND matcar.sigla_f=materia.sigla AND  nombre_c like '%$carrera%' AND semestre like '%$semestre%' AND nombre_m like '%$materia%' ORDER BY semestre ASC ";
		return parent::ejecutar($sql);
	}



}    
?>
