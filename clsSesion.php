<?php
include_once('clsConexion.php');
class Session extends Conexion
{
	//atributos
	private $user;
	private $pass;
	
	//construtor
	public function Session()
	{   parent::Conexion();
		$this->user="";


	}
	//propiedades de acceso
	public function setUsuario($valor)
	{
		$this->user=$valor;
	}
	public function getUsuario()
	{
		return $this->User;
	}
	public function setPassword($valor)
	{
		$this->pass=$valor;
	}
	public function getPassword()
	{
		return $this->pass;
	}


	public function Verificar(){
		$consulta="SELECT * from usuario where id='$this->user' AND password='$this->pass'";
		return parent::ejecutar($consulta);
	}
	
}    
?>