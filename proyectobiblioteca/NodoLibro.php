<?php
class NodoLibro{
    private $idEditorialN;
    private $idLibro;
    private $titulo;
    private $autor;
    private $pais;
    private $ano;
    private $cantidad;
    private $abajo;
    
    function __construct($id,$titulo,$autor,$pais,$ano,$cantidad,$idEditorialN){
        $this->idLibro = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->pais = $pais;
        $this->ano = $ano;
        $this->cantidad = $cantidad;
        $this->idEditorialN = $idEditorialN;
    }

   
    function getIdEditorialN(){
        return $this->idEditorialN;
    }
    function setIdEditorialN($idEditorialN){
        $this->idEditorialN = $idEditorialN;
    }
   
    function getIdLibro(){
        return $this->idLibro;
    }
    function setIdLibro($idLibro){
        $this->idLibro = $idLibro;
    }
 
    function getTitulo(){
        return $this->titulo;
    }
    function setTitulo($titulo){
        $this->titulo = $titulo;
    }
 
    function getAutor(){
        return $this->autor;
    }
    function setAutor($autor){
        $this->autor = $autor;
    }
 
    function getPais(){
        return $this->pais;
    }
    function setPais($pais){
        $this->pais = $pais;
    }
 
    function getAno(){
        return $this->ano;
    }
    function setAno($ano){
        $this->ano = $ano;
    }

    function getCantidad(){
        return $this->cantidad;
    }
    function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
 
    function getAbajo(){
        return $this->abajo;
    }
    function setAbajo($abajo){
        $this->abajo = $abajo;
    }
}
