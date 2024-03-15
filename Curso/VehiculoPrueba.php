<?php
class Vehiculo {
    public $motor = false;
    public $marca;
    public $color;

    //Metodos
    public function estado(){
        if($this->motor){
            echo "El motor esta encendido<br>";

        } else {
            echo "El motor esta apagado<br>";
        }

    }

    public function encender(){
        if($this->motor){
            echo "Tenga cuidado, el motor esta encendido<br>";
            

        }else {
            echo "El motor ahora esta encendido<br>";
            $this->motor = true;
        }
    }
}
class Moto extends Vehiculo{
    public function EstadoMoto(){
        $this->estado();
    }
}

class cuatrimoto extends Moto{

}
$moto = new cuatrimoto();
$moto->estado();


?>