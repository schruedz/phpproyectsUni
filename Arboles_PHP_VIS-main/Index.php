<!DOCTYPE html>
<html lang="en">

<head>
  
   
    <script type="text/javascript" src=" vis/dist/vis.js"></script>
    
    
   
    <title>Árbol Binario</title>
</head>

<body onload="draw();">
    <div class="header">
        <i class="fas fa-project-diagram"></i>
        <h1>ÁRBOL BINARIO</h1>
        <?php
    include("Arbol.php");
    session_start();
    if (!isset($_SESSION["Arbol"])) {
    $_SESSION["Arbol"] = new Arbol();
    }
?>
        <div class="agergar_raiz">
            <?php
        if (isset($_POST["Raiz"])){
            $_SESSION["Arbol"]->CrearArbol($_POST["Raiz"]);
        }
        ?>
        </div>

        <div class="agergar_nodo">
            <?php
        if (isset($_POST["Numero_Padre"], $_POST["Numero_Hijo"], $_POST["Lado"])) {
            if($_SESSION["Arbol"]->Obtener_Raiz() !=null){
                $aux= $_SESSION["Arbol"]->Busqueda($_SESSION["Arbol"]->Obtener_Raiz(),$_POST["Numero_Padre"]);
                $aux2 = $_SESSION["Arbol"]->Busqueda($_SESSION["Arbol"]->Obtener_Raiz(),$_POST["Numero_Hijo"]);
                if($aux!=null){
                    if ($aux2 == null) {
                        $_SESSION["Arbol"]-> agregarNodo($_POST["Numero_Padre"], $_POST["Lado"], new Node($_POST["Numero_Hijo"]));
                    }else{
                        echo "<span>LA ID ". $_POST["Numero_Hijo"]." YA SE ENCUENTRA REGISTRADA</span>";
                    }
                }else{
                    echo "<span>NO SE HA ENCONTRADO ESTE NODO ".$_POST["Numero_Padre"]. " COMO PADRE</span>";
                }
            }
        }
        ?>
        </div>
        <div class="eliminar_nodo">
            <?php
        if (isset($_POST["Nodo_Eliminar"])){
            echo '<span>'.$_SESSION["Arbol"]->EliminarNodo($_POST["Nodo_Eliminar"]).'</span>';
        }
        ?>
        </div>

        <div class="Pre-Order">
            <?php
        if (isset($_POST["PreOrden"])) {
        if($_SESSION["Arbol"]->Obtener_Raiz()!=null){
            $_SESSION["Arbol"]->setVectorR();
            $_SESSION["Arbol"]->preOrden($_SESSION["Arbol"]->Obtener_Raiz());
            $x="";
            foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                $x = $x. " | ".$valor." | - ";
            }  
            echo"<span>EL RECORRIDO PRE-ORDEN ES: ". $x. '</span>';
        }else{
            echo "<span>EL ÁRBOL ESTÁ VACIO</span>";
        } 
    }
        ?>
        </div>

        <div class="in_order">
            <?php
        if (isset($_POST["InOrden"])) {
        if($_SESSION["Arbol"]->Obtener_Raiz()!=null){
            $_SESSION["Arbol"]->setVectorR();
            $_SESSION["Arbol"]->InOrden($_SESSION["Arbol"]->Obtener_Raiz());
            $x="";
            foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                $x=$x. " | ".$valor." | - ";
            }
                echo'<span>EL RECORRIDO IN-ORDEN ES: '.$x.'</span>';
        }else{
                echo'<span>EL ÁRBOL ESTÁ VACIO</span>';
        }
    }
        ?>
        </div>
        <div class="post_order">
            <?php
        if (isset($_POST["PosOrden"])) {
        if($_SESSION["Arbol"]->Obtener_Raiz()!=null){
            $_SESSION["Arbol"]->setVectorR();
            $_SESSION["Arbol"]->PosOrden($_SESSION["Arbol"]->Obtener_Raiz());
            $x="";
            foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                $x=$x. " | ".$valor." | - ";
            }
            echo '<span> EL RECORRIDO POS-ORDEN ES: ' .$x.'</span>';
        }else{
            echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
        }
    }
        ?>
        </div>
        <div class="Por_niveles">
            <?php
        if (isset($_POST["PorNiveles"])) { 
        if($_SESSION["Arbol"]->Obtener_Raiz()!=null){
            $x=($_SESSION["Arbol"]->recorridoN($_SESSION["Arbol"]->Obtener_Raiz()));
            echo '<span> EL RECORRIDO POR NIVELES ES: ' . $x .'</span>';
        }else{
            echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
        }
    }
        ?>
        </div>

        <div class="ContarNodos">
            <?php
        if (isset($_POST["ContarNodo"])) {
        $x=($_SESSION["Arbol"]-> Contar_Nodos($_SESSION["Arbol"]->Obtener_Raiz()));
        echo'<span>EL NÚMERO DE NODOS EN EL ÁRBOL ES: ' .$x.'</span>';
    }
        ?>
        </div>
        <div class="contar_pares">
            <?php
        if (isset($_POST["contarP"])) {
        $x=($_SESSION["Arbol"]->contarPares($_SESSION["Arbol"]->Obtener_Raiz()));
        echo'<span>EL NÚMERO DE NODOS PARES EN EL ÁRBOL ES: '.$x.'</span>';
    }
        ?>
        </div>
        <div class="Calcular_altura">
            <?php
        if (isset($_POST["Altura"])) {
        if($_SESSION["Arbol"]->Obtener_Raiz()!=null){
            $x=$_SESSION["Arbol"]->alturaArbol($_SESSION["Arbol"]->Obtener_Raiz());;
            echo '<span>LA ALTURA DEL ÁRBOL ES DE: ' .$x.' NIVELES</span>';
        }else{
            echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
        }
    }
        ?>
        </div>
 
        <div class="Arbol_Completo">
            <?php
        if (isset($_POST["ArbolCompleto"])) {
        if($_SESSION["Arbol"]->Obtener_Raiz()!=null){
            $x=($_SESSION["Arbol"]->Completo($_SESSION["Arbol"]->Obtener_Raiz()));
            echo '<span>'.$x.'</span>';
        }else{
            echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
        }
    }
        ?>
        </div>
     
        <div class="verHojas">
            <?php
        if (isset($_POST["NodosHojas"])) {
        if($_SESSION["Arbol"]->Obtener_Raiz()!=null){
            $_SESSION["Arbol"]->setVectorR();
            $_SESSION["Arbol"]->MostrarHojas($_SESSION["Arbol"]->Obtener_Raiz());
            $x="";
            foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                $x=$x. " | ".$valor." | ";
            }
            echo '<span>LOS NODOS HOJAS SON: '. $x.'</span>';
        }else{
            echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
        }
    }
        ?>
        </div>
    </div>

    <div class="Canvas_arbol" id="Canvas_arbol"></div>
    <section>
        <div class="container_formulario">
            <div class="Agregar_arbol">
                <h1>Crear Árbol</h1>
                <div class="Formulario_raiz">
                    <form action="index.php" method="Post" id="Agergar_Raiz">
                        <input type="number" min="1" name="Raiz" placeholder="NODO RAIZ" require>
                        <button type="submit" name="AgregarRaiz" ></i> Agregar
                            Raíz</button>
                    </form>
                    <br>
                

                <div class="formulario_nodo">
                    <form action="index.php" method="post" id="Agergar_nodo" class="Agergar_nodo">
                        <input type="number" min="1" placeholder="NODO PADRE" name="Numero_Padre" require>
                        <div class="lado">
                            <input type="radio" name="Lado" id="izquierda" value="Izquierda" required><label
                                for="izquierda">IZQUIERDA</label><br>
                            <input type="radio" name="Lado" id="derecha" value="Derecha" required> <label
                                for="derecha">DERECHA</label><br>
                        </div>
                        <input type="number" min="1" placeholder="NODO HIJO" name="Numero_Hijo" require>
                        <button type="submit" name="AgregarRaiz" class="btn"><i class="fas fa-angle-right"></i> Agregar
                            Nodo</button>
                    </form>
                </div>
                <div class="Eliminar">
                    <form action="index.php" method="post">
                        <input type="number" min="1" placeholder="NODO A ELMINAR" name="Nodo_Eliminar" require>
                        <button type="submit" name="AgregarRaiz" class="btn"><i class="fas fa-trash"></i>Eliminar
                            Nodo</button>
                    </form>
                </div>
            </div>

            <div class="Opciones">
                <form action="index.php" method="post">
                    <h1>Opciones</h1>
                    <button type="submit" name="PreOrden" class="btn" value="Recorrido Pre-Orden"><i
                            class="fas fa-route"></i>Recorrido Pre-Orden</button>
                    <button type="submit" name="InOrden" class="btn" value="Recorrido In-Orden"><i
                            class="fas fa-route"></i>Recorrido In-Orden</button>
                    <button type="submit" name="PosOrden" class="btn" value="Recorrdio Pos-Orden"><i
                            class="fas fa-route"></i>Recorrido Pos-Orden</button>
                    <button type="submit" name="PorNiveles" class="btn" value="Recorrido Por Niveles"><i
                            class="fas fa-sort-amount-down-alt"></i>Recorrido Por Niveles</b>
      
                        <button type="submit" name="ContarNodo" class="btn" value="Contar Nodos"><i
                                class="fas fa-sort-numeric-down"></i>Contar Nodos</button>
                        <button type="submit" name="contarP" class="btn" value="Contar Nodos Pares"><i
                                class="fas fa-divide"></i>Contar Pares</button>
                        <button type="submit" name="Altura" class="btn" value="Calcular Altura"><i
                                class="fas fa-ruler-vertical"></i>Calcular Altura</button>

                        <button type="submit" name="ArbolCompleto" class="btn" value="¿Arbol Completo?"><i
                                class="fas fa-question"></i>¿Árbol Completo?</button>
                        <button type="submit" name="NodosHojas" class="btn" value="Ver Nodos Hojas"><i
                                class="fas fa-leaf"></i>Ver Nodos Hojas</button>
                </form>
                <br>
            </div>
        </div>

    </section>

    <?php
    class Optener{
        public function Optener_nodos($nodo) {
            if ($nodo != null) {
                $Valor = $nodo->getValor();
                echo "Nodos.push({id: $Valor, label: String($Valor)});";
                $this->Optener_nodos($nodo->getIzquierda());
                $this->Optener_nodos($nodo->getDerecha());
            }
        }
    public function edges($n) {
        if ($n != null) {
            $p = $n->getValor();
            if ($n->getIzquierda() != null) {
                $h = $n->getIzquierda()->getValor();
                echo "edges.push({from: $p, to: $h});";
            }
            if ($n->getDerecha() != null) {
                $h = $n->getDerecha()->getValor();
                echo "edges.push({from: $p, to: $h},);";
            }
            $this->edges($n->getIzquierda());
            $this->edges($n->getDerecha());
            }
        }
    }
?>

   
    <script type="text/javascript">
    var network = null;

    function destroy() {
        if (network !== null) {
            network.destroy();
            network = null;
        }
    }

    function draw() {
        destroy();
        Nodos = [];
        edges = [];

        <?php
        $op = new Optener();
        $op->Optener_nodos($_SESSION['Arbol']->Obtener_Raiz());
        $op->edges($_SESSION['Arbol']->Obtener_Raiz());
        ?>
        var container = document.getElementById('Canvas_arbol');

        var data = {
            nodes: Nodos,
            edges: edges
        };
        var options = {
            interaction: {
                zoomView: true
            },
            edges: {
                width: 4,
                smooth: {
                    roundness: 0
                }
            },
            nodes: {
                borderWidth: 2,
                chosen: false,
                color: {
                    background: '#1883ba'
                },
                font: {
                    color: '#fff',
                    size: 18
                },
            },
            layout: {
                hierarchical: {
                    sortMethod: "directed"
                },
            },
        };
        network = new vis.Network(container, data, options);
    }
    </script>

</body>

</html>