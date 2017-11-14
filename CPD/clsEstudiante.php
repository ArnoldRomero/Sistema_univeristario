<?php
include_once('clsConexion.php');
class Estudiante extends Conexion
{
	//atributos
	private $reg_estudiante;
	private $nombres;
	private $paterno;
    private $materno;
    private $email;
    private $sexo;
    private $carrera;
	
	//construtor
	public function Estudiante()
	{   parent::Conexion();
		$this->reg_estudiante=0;
		$this->nombres="";
		$this->paterno="";
        $this->materno="";
        $this->email="";
        $this->sexo="";
        $this->carrera="";
	}
	//propiedades de acceso
	public function setRegEstudiante($valor)
	{
		$this->reg_estudiante=$valor;
	}
	public function getRegEstudiante()
	{
		return $this->reg_estudiante;
	}

	public function setNombre($valor)
	{
		$this->nombres=$valor;
	}
	public function getNombre()
	{
		return $this->nombres;
	}

	public function setPaterno($valor)
	{
		$this->paterno=$valor;
	}
	public function getPaterno()
	{
		return $this->paterno;
	}
    
    public function setMaterno($valor)
	{
		$this->materno=$valor;
	}
	public function getMaterno()
	{
		return $this->materno;
	}
	public function setEmail($valor)
	{
		$this->email=$valor;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setSexo($valor)
	{
		$this->sexo=$valor;
	}
	public function getSexo()
	{
		return $this->sexo;
	}
	public function setCarrera($valor)
	{
		$this->carrera=$valor;
	}
	public function getCarrera()
	{
		return $this->carrera;
	}


	//-------------Metodos de Procedimientos------------//

	public function Guardar()
	{
     $sql="insert into estudiante(reg_estudiante,nombres,paterno,materno,sexo,email,carrera_e) values('$this->reg_estudiante','$this->nombres','$this->paterno','$this->materno','$this->sexo','$this->email','$this->carrera')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function Eliminar()
	{
		$sql="delete from estudiante where reg_estudiante='$this->reg_estudiante'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function Modificar(){
		$sql="update estudiante set nombres='$this->nombres', paterno='$this->paterno', materno='$this->materno', email='$this->email',sexo='$this->sexo',carrera_e='$this->carrera' where reg_estudiante='$this->reg_estudiante'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	//-----------Metodos de Funcion----------//

	public function Buscar(){
		$consulta="select * from estudiante";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorRegistro($criterio){
		$consulta="select * from estudiante where reg_estudiante like '$criterio%'";
		return parent::ejecutar($consulta);
	}

	public function BuscarPorNombreApellido($criterio){
		$consulta="select * from estudiante where concat (nombres,' ',paterno) like '%$criterio%'";
		return parent::ejecutar($consulta);
	}

	public function Buscarxregnom($nombre,$registro){
		$consulta="SELECT * from estudiante where reg_estudiante like '$registro%' AND concat (nombres,' ',paterno) like '%$nombre%'";
		return parent::ejecutar($consulta);
	}


	public function estudiantesvarones(){
		$consulta="SELECT * from estudiante where sexo='M'";
		return parent::ejecutar($consulta); 
	}

	public function estudiantesmujeres(){
		$consulta="SELECT * from estudiante where sexo='F'";
		return parent::ejecutar($consulta); 
	}
}    
?>