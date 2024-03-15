<?php
class NodoEditorial{
    private $idEditorial;
    private $denominacion;
    private $anterior;
    private $siguiente;
    private $abajo;
    

    function __construct($idEditorial, $denominacion){
        $this->idEditorial = $idEditorial;
        $this->denominacion = $denominacion;
        $this->anterior = null;
        $this->siguiente = null;
        $this->abajo = null;
    }
    

    function getIdEditorial(){
        return $this->idEditorial;
    }
    function setIdEditorial($editorial){
        $this->idEditorial = $editorial;
    }

    function getDenominacion(){
        return $this->denominacion;
    }
    function setDemoninacion($denominacion){
        $this->denominacion = $denominacion;
    }
   
    function getSiguiente(){
        return $this->siguiente;
    }
    function setSiguiente($siguiente){
        $this->siguiente = $siguiente;
    }

    function getAnterior(){
        return $this->anterior;
    }
    function setAnterior($Anterior){
        $this->anterior = $Anterior;
    }
  
    function getAbajo(){
        return $this->abajo;
    }
    function setAbajo($a){
        $this->abajo = $a;
    }
}
