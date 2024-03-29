<?php
class Node{
    private $Valor;
    private $Padre;
    private $Izquierda;
    private $Derecha;

    function __construct($Valor) {
        $this->Valor = $Valor;
        $this->Padre = null;
        $this->Izquierda = null;
        $this->Derecha = null;
    }

    public function getValor() {
        return $this->Valor;
    }

    public function getPadre(){
        return $this->Padre;
    } 

    public function getIzquierda() {
        return $this->Izquierda;
    }

    public function getDerecha() {
        return $this->Derecha;
    }
    public function setValor($valor) { 
        $this->Valor = $valor;
    }

    public function setPadre($padre){
        $this->Padre = $padre;
    }

    public function setIzquierda($izquierda) {
        $this->Izquierda = $izquierda;
    }

    public function setDerecha($derecha) {
        $this->Derecha = $derecha;
    }
}
?>