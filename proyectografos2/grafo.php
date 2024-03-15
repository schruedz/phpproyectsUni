<?php
include("vertice.php");
Class Grafo{

	
		private $matrizA;
		private $vectorV;
		private $dirigido;

		public $visited = [];
		public $graph = [];

		public function __construct($dir = true){
			$this->matrizA = null;
			$this->vectorV = null;
			$this->dirigido = $dir;
		}

		public function agregarVertice($v){
			if(!isset($this->vectorV[$v->getId()])){
                $this->matrizA[$v->getId()] = [];
                $this->vectorV[$v->getId()] = $v;
            } else{
                return false;
            }
            return true;
		}

		public function getVertice($v){
			return $this->vectorV[$v];
		}

	
		public function agregarArista($origen, $destino, $peso = null){
			if (isset($this->vectorV[$origen]) && isset($this->vectorV[$destino])){
				$this->matrizA[$origen][$destino] = $peso;
			}else{
				return false;
			} 

			return true;
		}

		public function getAdyacentes($v){
			$mensaje = "Adyacentes de $v<br>";
			if($this->matrizA[$v] != null){
				$mensaje = $mensaje."$v->";
				foreach ($this->matrizA[$v] as $vertice => $peso) {
					$mensaje = $mensaje."| $vertice | $peso |--";
				}
			}else{
				return false;
			}
			return $mensaje;
		}

		public function getAdyacentes2($v){
			return $this->matrizA[$v];
		}

		public function getMatrizA(){
			return $this->matrizA;
		}

		public function getVectorV(){
			return $this->vectorV;
		}

		public function gradoSalida($v){	
			if ($this->matrizA[$v] != null) {
				return count($this->matrizA[$v]);
			}else{
				return 0;
			}
		}

		public function gradoEntrada($v){
			$gr = 0;
			if ($this->matrizA != null){
				foreach ($this->matrizA as $vp => $adya) {
					if($adya !=null){
						foreach ($adya as $de => $pe) {
							if($de == $v){
								$gr++;
							}
						}
					}
				}
			}
			return $gr;
		}

		public function grado($v){
			if ($this->gradoSalida($v)==0) {
				return $this->gradoEntrada($v);
			}else if($this->gradoSalida($v) == 0 && $this->gradoEntrada($v)==0){
				return 0;
			}else{
				return $this->gradoSalida($v) + $this->gradoEntrada($v);
			}
		}

		public function eliminarArista($origen, $destino){
			if (isset($this->matrizA[$origen][$destino])){
				unset($this->matrizA[$origen][$destino]);
			}else{
				return false;
			}

			return true;
		}

		public function eliminarVertice($v){
			if(isset($this->vectorV[$v])){
				foreach ($this->matrizA as $vp => $adya) {
					if($adya !=null){
						foreach ($adya as $de => $pe) {
							if($de == $v){
								unset($this->matrizA[$vp][$de]);
							}
						}
					}
				}
				unset($this->matrizA[$v]);
				unset($this->vectorV[$v]);
			} else{
				return false;
			}
			return true;
		}




	

		

}
