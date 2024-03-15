<?php
class Vertice{

	private $id;
	private $visitado;
	private $precio;
	private $categoria;
	private $duracion;

	public function __construct($i,$p,$c,$d){
		$this->id = $i;
		$this->precio = $p;
		$this->categoria = $c;
		$this->duracion = $d;
		$this->visitado = false;
		

	}

	public function getId(){
		return $this->id;
	}

	public function setId($i){
		$this->id = $i;
	}

	public function getVisitado(){
		return $this->visitado;
	}

	public function setVisitado($v){
		$this->visitado = $v;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($p){
		$this->precio = $p;
	}

	public function getCategoria(){
		return $this->categoria;
	}
	public function setCategoria($c){
		$this->categoria = $c;
	}
	public function getDuracion(){
		return $this->duracion;
	}
	public function setDuracion($d){
		$this->duracion = $d;
	}


}
?>