<?php

    class Nodo{
        private $info;
        private $sig;

        public function __construct($i)
        {
            $this->info = $i;
            $this->siguiente = null;
        }

        function getInfo(){
            return $this->info;
        }

        function getSig(){
            return $this->sig;
        }
        
        function setInfo($i){
            $this->info = $i;  
        }
        function setSig($i){
            $this->sig = $i;  
        }
    }




?>