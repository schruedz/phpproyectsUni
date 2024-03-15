<?php

    class Pagina{


        public $nombre = "Facebook";
        public static $url = "facebook.com";


        //Metodos
        public function bienvenida(){
            echo "Bienvenido a <b> " . $this->nombre . "</b> la pagina es <b>" . Pagina::$url . "<b><br>";
        }
    
        public static function bienvenida2(){
            echo "Bienvenidos " . self::$nombre;
        }

    }
Pagina::bienvenida2();

?>