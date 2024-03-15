<?php
class Vertice{

	private $id;
	private $nombre;
	private $descripcion;
	private $calificacion;
	private $precio;
	private $categoria;
	private $dv;

	public function __construct($id, $nombre, $descripcion, $calificacion, $precio, $categoria, $dv){
		$this->id = $id;
		$this->nombre-> $nombre;
		$this->descripcion-> $descripcion;
		$this->calificacion-> $calificacion;
		$this->precio-> $precio;
		$this->categoria-> $categoria;
		$this->dv-> $dv;

	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getnombre(){
		return $this->nombre;
	}

	public function setnombre($nombre){
		$this->nombre = $nombre;
	}

	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setdescrpcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getcalificacion(){
		return $this->calificacion;
	}

	public function setcalificacion($calificacion){
		$this->calificacion = $calificacion;
	}

	public function getprecio(){
		return $this->precio;
	}

	public function setprecio($precio){
		$this->precio = $precio;
	}

	public function getcategoria(){
		return $this->categoria;
	}

	public function setcategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getdv(){
		return $this->dv;
	}

	public function setdv($dv){
		$this->dv = $dv;
	}


	
}
?>