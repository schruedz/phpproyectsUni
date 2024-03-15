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
        $P = $this->ptr;
        $Encontrado = false;

        while($P != null && $Encontrado == false){

            if($P->getNombre() == $P){
                $Encontrado = true;


            } else {
                $P=$P->getSig();
            }
        }

        return $P;
    }
    function EliminarContacto($B){
        $P = $this->ptr;
        $Ant=$P;
        $Encontrado = false;    
        $Eliminado = false;
        while ($P != null && $Encontrado==false){
            if($P->getNombre() == $B){
                $Encontrado = true;


            }else {
                $Ant = $P;
                $P = $P->getSig();
            }

        }
        if($P == null){
            $Eliminado = false;
        } else {
            if($P==$this->ptr){
                $this->ptr = $this->ptr->getSig();
                if ($P == $this->final){
                    $this->final=null;


                }
            } else {
                $Ant->setSig($P->getSig());
                if($P == $this->final){
                    $this->final = $Ant;
                }
            }
            $P = null;
            $Eliminado = null;



            $Eliminado = true;
        }
        return $Eliminado;
    }

}

?> 