<?php
include ("Contacto.php");


class Agenda {
    private $ptr =null;
    private $final =null;

    function __construct()
    {
        $this->ptr;
        $this->final;
    }

    function agregarContactoPrincipio($P){
        if($this->ptr == null){
            $this->final = $P;
            

        } else {
            $P->setSig($this->ptr);

        }
        $this->ptr = $P;
    }


    function VerContactos(){
        $P = $this->ptr;
        

        if($this->ptr == null){
            return "Lista Vacia";

        } else {
            while($P != null){
                $this->Formato($P->getNombre(),$P->getNumero(),$P->getCorreo()."<br>");
                $P=$P->getSig();
            }
            }

        
        
    }

    function Formato($nombre,$numero,$correo){
        echo ("Nombre: ". $nombre . " Numero: ". $numero. " Correo: ". $correo);
    }
    function agregarContactoFinal($P){
        if($this->ptr == null){
            $this->ptr = $P;
        } else {
            $this->final->setSig($P);
        }
        $this->final = $P;
    }

    function BuscarContacto($P){
        $aux = $this->ptr;

        while($aux != null){

            if($aux->getNombre() == $P){
                return ($aux);
            } else {
                $aux=$aux->getSig();
            }
        }

        return false;
    }

    function EliminarContacto($P) {
        $aux = $this->ptr;
        $ant = $aux;

        while ($aux != null) {
            if($aux->getNombre() == $P) {
                if ($aux == $this->ptr) {
                    $this->ptr = $aux->getSig();
                    return true;
                } else if ($aux == $this->final) {
                    $this->final = $ant;
                    $this->final->setSig(null);
                    return true;
                } else {
                    $ant->setSig($aux->getSig());
                    return true;
                }

            }
            $ant = $aux;
            $aux=$aux->getSig();
        }
        return false;
    }

}

?> 