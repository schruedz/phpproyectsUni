<?php

class facebook {
    public $nombre;
    public $edad;
    private $contraseña;



    //Metodos


    public function __construct($nombre,$edad,$contraseña){
        $this->nombre =$nombre;
        $this->edad = $edad;
        $this->contraseña = $contraseña;
    }

    public function verInformacion(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Contraseña: " . $this->contrasñea . "";
    }

    private function CambiarContra($contraseña){
        $this->contraseña = $contraseña;
    }
}
$facebook = new Facebook("Carlos Fernandes", "23","123");
$facebook->verInformacion();




?>