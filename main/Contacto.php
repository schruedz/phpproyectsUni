<?php


class Contacto {
    private $nombre = "";
    private $num_tel = "";
    private $correo = "";
    private $sig =null ;

    function __construct(String $nombre, String $num_tel, String $correo)
    {
        $this->nombre = $nombre;
        $this->num_tel = $num_tel;
        $this->correo = $correo;
        $this->sig = null;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getNumero(){
        return $this->num_tel;
    }
    function getCorreo(){
        return $this->correo;
    }
    function getSig(){
        return $this->sig;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;  
    }
    function setNumero($num_tel){
        $this->numero = $num_tel;  
    }
    function setCorreo($correo){
        $this->correo = $correo;  
    }
    function setSig($i){
        $this->sig = $i;  
    }


}  

?>