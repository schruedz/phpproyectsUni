<?php
	include("NodoEditorial.php");
	include("NodoLibro.php");
	class Mmultilista{

		private $PTR;
		private $FINAL;

		function __construct(){
			$this->PTR = null;
			$this->FINAL = null;
		}

		function AgregarEditorial($NodoE){
			if ($this->PTR == null){
                $this->PTR = $NodoE;
				$this->FINAL = $NodoE;
            }else{
                $this->FINAL->setSiguiente($NodoE);
                $NodoE->setAnterior($this->FINAL);
            }
            $this->FINAL = $NodoE;
		}
		

		function BuscarEditorial($id){
			$P = $this->PTR;
            $Encontrado = False;
            while ($P != null && $Encontrado == False){
                if ($P->getIdEditorial() == $id){
                    $Encontrado = true;
                }else{
                    $P = $P->getSiguiente();
                }
            }
        	return $P;
        }

		function EditorialVacia($P){
			$editoral_vc = $this->BuscarEditorial($P);
			if($editoral_vc->getAbajo() == null){
				return true;
			}else{
				return false;
			}
		}
		
		function ApuntarFinalLibro($editorial){
			$L = $editorial->getAbajo();
			while ($L->getAbajo() != null) {
				$L = $L->getAbajo();
			}
			return $L;
		}

		function EliminarEditorial($NombreE){
            $E = $this->BuscarEditorial($NombreE);
            if($E == NULL){
                return false;
            }else{
                if ($E === $this->PTR) {
                    if($E->getSiguiente() == NULL){
                        $this->PTR = NULL;
                        $this->FINAL = NULL;
                    }else{
                        $this->PTR = $this->PTR->getSiguiente();
                        $this->PTR->setAnterior(NULL);
                    }
                }else{ 
                    if($E === $this->FINAL){
						$this->FINAL->getAnterior()->setSiguiente(NULL);
                        $this->FINAL = $E->getAnterior();
                    }else{
                        $Auxiliar = $E->getAnterior();
                        $Auxiliar->setSiguiente($E->getSiguiente());
                    }
                }
                $E = NULL;
                return true;
            }
        }

		function AgregarLibro($Libro,$E){
			$editoral_add = $this->BuscarEditorial($E);
			if ($editoral_add!=null) {
				if($this->EditorialVacia($editoral_add->getIdEditorial())){
					$editoral_add->setAbajo($Libro);
				}else{
					$LibroFINAL =$this->ApuntarFinalLibro($editoral_add);
					$LibroFINAL->setAbajo($Libro);
				}
			}else{
				echo "La E donde desea ingresar el libro no exite";
			}
		}
		
		function mostrarMultilista(){ 
			$NE = $this->PTR;
			$Mensaje = "";
			if ($this->PTR == null) {
				echo "<br><hr><br>La lista se encuentra vacia";
			}else{
				while($NE != null){
					$Mensaje = $Mensaje."{ | Id: ".$NE->getIdEditorial()." | Nombre: ".$NE->getDenominacion()." }<br>";
					$Lib = $NE->getAbajo();
					while ($Lib != null) {
						$Mensaje = $Mensaje."{ | Id Libro: ".$Lib->getIdLibro()." | Nombre: ".$Lib->getTitulo()." | Cantidad: ".$Lib->getCantidad()." | Id Editorial: ".$Lib->getIdEditorialN()." }<br>"; 
						$Lib = $Lib->getAbajo();
					}
					$NE = $NE->getSiguiente();
				}
				$Mensaje = $Mensaje;
			}
			return $Mensaje;
		}

		function BuscarLibro($NombreE,$idLibro){
			$NE = $this->BuscarEditorial($NombreE);
			if ($NE == null) {
				return "La Editorial no existe";
			}else{
				$Aux = $NE->getAbajo();
				$Encontrado = false;
				while ($Aux != null && $Encontrado == false) {
					if($Aux->getIdLibro()==$idLibro){
						$Encontrado = true;
					}else{
						$Aux = $Aux->getAbajo();
					}
				}
				return $Aux;
			}
		}

		public function EliminarLibro($IdLibro, $NombreE){
        $P = $this->BuscarEditorial($NombreE);
        if ($P == null) {
            return false;
        } else {
            $Q = $P->getAbajo();
            $Ant = $Q;
            $Encontrado = false;
            while ($Q != null && $Encontrado == false) {
                if ($Q->getIdLibro() == $IdLibro) {
                    $Encontrado = true;
                } else {
                    $Ant = $Q;
                    $Q = $Q->getAbajo();
                }
            }
            if ($Q == null) {
                return false;
            } else {
                if ($Q === $P->getAbajo()) {
                    $P->setAbajo($Q->getAbajo());
                } else {
                    $Ant->setAbajo($Q->getAbajo());
                }
                $Q = null;
                return true;
            }
        }
    }

		function verDetallesLibro($NombreE,$IdLi){
			$Mensaje = "";
			$NL = $this->BuscarLibro($NombreE,$IdLi);
			if ($NL == null) {
				$Mensaje = "Libro no encontrado";
			} else {
				$Mensaje = "<br><br>"."ID libro: ".$NL->getIdLibro()."<br>"."Titulo: ".$NL->getTitulo()."<br>"."Autor: ".
		$NL->getAutor()."<br>"."Pais: ".$NL->getPais()."<br>"."Año: ".$NL->getAno()."<br>"."Cantidad: ".$NL->getCantidad();
		}
		return $Mensaje;		
		}

		function ActualizarInventario($idEditorial, $idLibro, $cantidad){
			$libro = $this->BuscarLibro($idEditorial, $idLibro);
			if ($libro == null) {
				return false;
			}else{
				$libro->setCantidad($cantidad);
				return true;
			}
		}

		function LibrosPorAño($Ano){ 
			$Cont = 0;
			$Aux = $this->PTR;
			while($Aux != null){
				$Aux2 = $Aux->getAbajo();
				while($Aux2 != null){					
					if($Aux2->getAno() == $Ano){
						$Cont = $Cont + 1;	
					}
					$Aux2 = $Aux2->getAbajo();
				}
				$Aux = $Aux->getSiguiente();
			}
			return $Cont;
		}

		function LibrosPorEditorial($IdEdi){  
			$contador = 0;
			$aux = $this->PTR;
			while($aux != null){
				if($aux->getIdEditorial() == $IdEdi){
					if($aux->getAbajo() != null){
						$abajo = $aux->getAbajo();
						while ($abajo != NULL) {
							$contador++;
							$abajo = $abajo->getAbajo();
						}
					}
				}
				$aux = $aux->getSiguiente();
			}
			return $contador;
		}

	}
