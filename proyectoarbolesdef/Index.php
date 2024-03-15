<!DOCTYPE html>
<html lang="en">

<head>


    <script type="text/javascript" src=" vis/dist/vis.js"></script>
    <link rel="stylesheet" href="style.css">


    <title>Árbol Binario</title>
    <h1> Arbol Binario</h1>
</head>

<body onload="draw();">


    <?php
    include("Arbol.php");
    session_start();
    if (!isset($_SESSION["Arbol"])) {
        $_SESSION["Arbol"] = new Arbol();
    }

    ?>

    </div>
    </div>
    <br>
    <div class="ArbolD" id="ArbolD"></div>
    <section>
        <br>

        <br>
        <div class="ContenedorFor">
            <hr>
            <div class="Agregar_arbol">

                <h1>Crear Árbol</h1>
                <br>
                <br>
                <form action="index.php" method="Post" id="Agergar_Raiz">
                    <input type="number" min="1" name="Raiz" placeholder="NODO RAIZ" style="margin-left: 35%;" require>
                    <button type="submit" name="AgregarRaiz" style="background-color:purple; color:white;"><i></i> Agregar
                        Raíz</button>
                </form>
                <br>
                <div class="formulario_nodo">
                    <form action="index.php" method="post" id="Agergar_nodo" class="Agergar_nodo">
                        <input type="number" min="1" placeholder="NODO PADRE" name="Numero_Padre" style="margin-left: 35%" require>
                        <br>

                        <input type="radio" name="Lado" id="izquierda" value="Izquierda" style="margin-left: 35%" required><label for="izquierda">IZQUIERDA</label><br>
                        <input type="radio" name="Lado" id="derecha" value="Derecha" style="margin-left: 35%" required> <label for="derecha">DERECHA</label><br>

                        <input type="number" style="margin-left: 35%" min="1" placeholder="NODO HIJO" name="Numero_Hijo" require>
                        <button type="submit" name="AgregarRaiz" style="background-color:purple; color:white;"><i></i> Agregar
                            Nodo</button>
                    </form>
                </div><br>
                <div class="Eliminar">
                    <form action="index.php" method="post">
                        <input type="number" min="1" placeholder="NODO A ELMINAR" name="Nodo_Eliminar" style="margin-left: 35%" require>
                        <button type="submit" name="AgregarRaiz" style="background-color:purple; color:white;"><i></i>Eliminar
                            Nodo</button>
                    </form>
                </div>
                <br>
                <hr>
                <div class="Opciones">

                    <form action="index.php" method="post">
                        <h1>Opciones</h1>
                        <br>
                        <div class="botones">
                            <button type="submit" name="PreOrden" value="Recorrido Pre-Orden" style="background-color:purple; color:white;"><i></i>Recorrido Pre-Orden</button>
                            <br>
                            <button type="submit" name="InOrden" value="Recorrido In-Orden" style="background-color:purple; color:white;"><i></i>Recorrido In-Orden</button>
                            <br>
                            <button type="submit" name="PosOrden" value="Recorrdio Pos-Orden" style="background-color:purple; color:white;"><i></i>Recorrido Pos-Orden</button>
                            <br>
                            <button type="submit" name="PorNiveles" value="Recorrido Por Niveles" style="background-color:purple; color:white;"><i></i>Recorrido Por Niveles</button>
                            <br>
                            <button type="submit" name="ContarNodo" value="Contar Nodos" style="background-color:purple; color:white;"><i></i>Contar Nodos</button>
                                <br>
                            <button type="submit" name="contarP" value="Contar Nodos Pares" style="background-color:purple; color:white;"><i></i>Contar Pares</button>
                                <br>
                            <button type="submit" name="Altura" value="Calcular Altura" style="background-color:purple; color:white;"><i></i>Calcular Altura</button>
                                <br>

                            <button type="submit" name="ArbolCompleto" value="¿Arbol Completo?" style="background-color:purple; color:white;"><i></i>¿Árbol Completo?</button>
                                <br>
                            <button type="submit" name="NodosHojas" value="Ver Nodos Hojas" style="background-color:purple; color:white;"><i></i>Ver Nodos Hojas</button>
                                <br>
                        </div>

                    </form>
                    <br>
                </div>
            </div>

    </section>

    <?php
    class Obtener
    {
        public function Optener_nodos($nodo)
        {
            if ($nodo != null) {
                $Valor = $nodo->getValor();
                echo "Nodos.push({id: $Valor, label: String($Valor)});";
                $this->Optener_nodos($nodo->getIzquierda());
                $this->Optener_nodos($nodo->getDerecha());
            }
        }
        public function edges($n)
        {
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
            $op = new Obtener();
            $op->Optener_nodos($_SESSION['Arbol']->Obtener_Raiz());
            $op->edges($_SESSION['Arbol']->Obtener_Raiz());
            ?>
            var container = document.getElementById('ArbolD');

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
                        background: "#800080",
                        border: "#000000",
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
<center>
    <div class= "echoxd">

    <div class="agregar_raiz">
        <?php
        if (isset($_POST["Raiz"])) {
            $_SESSION["Arbol"]->CrearArbol($_POST["Raiz"]);
        }
        ?>
    </div>

    <div class="agergar_nodo">
        <?php
        if (isset($_POST["Numero_Padre"], $_POST["Numero_Hijo"], $_POST["Lado"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $aux = $_SESSION["Arbol"]->Busqueda($_SESSION["Arbol"]->Obtener_Raiz(), $_POST["Numero_Padre"]);
                $aux2 = $_SESSION["Arbol"]->Busqueda($_SESSION["Arbol"]->Obtener_Raiz(), $_POST["Numero_Hijo"]);
                if ($aux != null) {
                    if ($aux2 == null) {
                        $_SESSION["Arbol"]->agregarNodo($_POST["Numero_Padre"], $_POST["Lado"], new Node($_POST["Numero_Hijo"]));
                    } else {
                        echo "<span>LA ID " . $_POST["Numero_Hijo"] . " YA SE ENCUENTRA REGISTRADA</span>";
                    }
                } else {
                    echo "<span>NO SE HA ENCONTRADO ESTE NODO " . $_POST["Numero_Padre"] . " COMO PADRE</span>";
                }
            }
        }
        ?>

    </div>
    <div class="eliminar_nodo">
        <?php
        if (isset($_POST["Nodo_Eliminar"])) {
            echo '<span>' . $_SESSION["Arbol"]->EliminarNodo($_POST["Nodo_Eliminar"]) . '</span>';
        }
        ?>
    </div>


    <div class="Pre-Order">
        <?php
        if (isset($_POST["PreOrden"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $_SESSION["Arbol"]->setVectorR();
                $_SESSION["Arbol"]->preOrden($_SESSION["Arbol"]->Obtener_Raiz());
                $x = "";
                foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                    $x = $x . " | " . $valor . " | - ";
                }
                echo "<span>EL RECORRIDO PRE-ORDEN ES: " . $x . '</span>';
            } else {
                echo "<span>EL ÁRBOL ESTÁ VACIO</span>";
            }
        }
        ?>
    </div>

    <div class="in_order">
        <?php
        if (isset($_POST["InOrden"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $_SESSION["Arbol"]->setVectorR();
                $_SESSION["Arbol"]->InOrden($_SESSION["Arbol"]->Obtener_Raiz());
                $x = "";
                foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                    $x = $x . " | " . $valor . " | - ";
                }
                echo '<span>EL RECORRIDO IN-ORDEN ES: ' . $x . '</span>';
            } else {
                echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
            }
        }
        ?>

    </div>
    <div class="post_order">
        <?php
        if (isset($_POST["PosOrden"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $_SESSION["Arbol"]->setVectorR();
                $_SESSION["Arbol"]->PosOrden($_SESSION["Arbol"]->Obtener_Raiz());
                $x = "";
                foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                    $x = $x . " | " . $valor . " | - ";
                }
                echo '<span> EL RECORRIDO POS-ORDEN ES: ' . $x . '</span>';
            } else {
                echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
            }
        }
        ?>
    </div>

    <div class="Por_niveles">
        <?php
        if (isset($_POST["PorNiveles"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $x = ($_SESSION["Arbol"]->recorridoN($_SESSION["Arbol"]->Obtener_Raiz()));
                echo '<span> EL RECORRIDO POR NIVELES ES: ' . $x . '</span>';
            } else {
                echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
            }
        }
        ?>
    </div>


    <div class="ContarNodos">
        <?php
        if (isset($_POST["ContarNodo"])) {
            $x = ($_SESSION["Arbol"]->Contar_Nodos($_SESSION["Arbol"]->Obtener_Raiz()));
            echo '<span>EL NÚMERO DE NODOS EN EL ÁRBOL ES: ' . $x . '</span>';
        }
        ?>
    </div>

    <div class="contar_pares">
        <?php
        if (isset($_POST["contarP"])) {
            $x = ($_SESSION["Arbol"]->contarPares($_SESSION["Arbol"]->Obtener_Raiz()));
            echo '<span>EL NÚMERO DE NODOS PARES EN EL ÁRBOL ES: ' . $x . '</span>';
        }
        ?>
    </div>
    <br>
    <div class="Calcular_altura">
        <?php
        if (isset($_POST["Altura"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $x = $_SESSION["Arbol"]->alturaArbol($_SESSION["Arbol"]->Obtener_Raiz());;
                echo '<span>LA ALTURA DEL ÁRBOL ES DE: ' . $x . ' NIVELES</span>';
            } else {
                echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
            }
        }
        ?>
    </div>
    <br>
    <div class="Arbol_Completo">
        <?php
        if (isset($_POST["ArbolCompleto"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $x = ($_SESSION["Arbol"]->Completo($_SESSION["Arbol"]->Obtener_Raiz()));
                echo '<span>' . $x . '</span>';
            } else {
                echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
            }
        }
        ?>
    </div>
    <br>
    <div class="verHojas">
        <?php
        if (isset($_POST["NodosHojas"])) {
            if ($_SESSION["Arbol"]->Obtener_Raiz() != null) {
                $_SESSION["Arbol"]->setVectorR();
                $_SESSION["Arbol"]->MostrarHojas($_SESSION["Arbol"]->Obtener_Raiz());
                $x = "";
                foreach ($_SESSION["Arbol"]->getVectorR() as $valor => $value) {
                    $x = $x . " | " . $valor . " | ";
                }
                echo '<span>LOS NODOS HOJAS SON: ' . $x . '</span>';
            } else {
                echo '<span>EL ÁRBOL ESTÁ VACIO</span>';
            }
        }
        ?>
        </div>
        </center>
</body>

</html>