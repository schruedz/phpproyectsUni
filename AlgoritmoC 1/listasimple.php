<?php
include ("nodo.php");


class ListaSimple{
    private $ptr =null;
    private $final =null;

    function __construct()
    {
        $this->ptr;
        $this->final;
    }

    function agregarNodoPrincipio($P){
        if($this->ptr == null){
            $this->final = $P;

        } else {
            $P->setSig($this->ptr);

        }
        $this->ptr = $P;
    }


    function VisualizarListas(){
        $P = $this->ptr;
        $Mensaje = "";

        if($this->ptr == null){
            return "Lista Vacia";

        } else {
            while($P != null){
                $Mensaje = $Mensaje."<br>- ".$P->getInfo();
                $P=$P->getSig();
            }
        }
        return "La lista es: $Mensaje";
    }

    function agregarNodoFinal($P){
        if($this->ptr == null){
            $this->ptr = $P;
        } else {
            $this->final->setSig($P);
        }
        $this->final = $P;
    }

    function NodoBuscar($B){
        $P = $this->ptr;
        $Encontrado = false;

        while($P != null && $Encontrado == false){
            if($P->getInfo()==$B){
                $Encontrado = true;


            } else {
                $P=$P->getSig();
            }
        }

        return $P;
    }
    function Eliminar($B){
        $P = $this->ptr;
        $Ant=$P;
        $Encontrado = false;    
        $Eliminado = false;
        while ($P != null && $Encontrado==false){
            if($P->getInfo() == $B){
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