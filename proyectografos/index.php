<?php
    include("grafo.php");
    session_start();
    if (!isset($_SESSION["grafo"])) {
        $_SESSION["grafo"] = new grafo();
    }

    $grafo = $_SESSION["grafo"];
    $opc = isset($_POST["opcion"]) ? $_POST["opcion"] : null;

    // Esta opción debe ir de primera antes de imprimir el json
    // ya que debe actualiar la variable de sesión con el contenido
    // del archivo para que se imprima correctamente
    if ($opc === "cargar_json") {
        $file = $_FILES['archivo'] ?? null;
        if ($file) {
            $content = file_get_contents($file['tmp_name']);
            $object = json_decode($content, true);
            $uploadGrafo = new grafo($object["dirigido"], $object["matrizA"], $object["vectorV"], $object["visited"], $object["graph"]);
            $_SESSION["grafo"] = $uploadGrafo;
        } else {
            echo "<script>alert('Archivo no enviado')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src=" vis/dist/vis.js"></script>
    <link rel="stylesheet" href="style/Style.css">
    <title>Grafos</title>
</head>

<body>
    <header>
        <br>
        <center>
            <h1>Visualización</h1>
        </center>
        <br>
    </header>
    <div class="grafo1" id="grafo1"></div>
    <br>
    <input type="submit" name="cliente" onclick="location.href='index2.php'" value="CLiente">
    <br>


    <div class="form-group text-center">
        <h2>Descargar archivo JSON</h2>
        <a href="savejson.php" target="_blank" rel="noopener noreferrer">Descargar Json</a>
    </div>
    <center>
        <h2>Agregar Punto Turistico</h2>

        <form action="index.php" method="post" id="Agregar">
            <input type="text" name="AgregarVertice" placeholder="Indexado Vertice" required>
            <input type="text" name="AgregarPrecio" placeholder="Precio" required>
            <input type="text" name="AgregarCategoria" placeholder="Categoria" required>
            <input type="text" name="AgregarDuracion" placeholder="Duracion" required>
            <input type="submit" value="Agregar">
         
        </form>
    </center>
    <br>

    <center>
        <h2>Agregar Conexion</h2>

        <form action="index.php" method="post" id="Agregar">
            <input type="text" name="Origen" placeholder="Origen" required>

            <input type="text" name="Destino" placeholder="Destino" required>

            <input type="number" name="Peso" placeholder="Ponderación" required>
            <input type="submit" value="Agregar" class="Agregar">
            <input type="text" name="id" value="<?php 
            
            if (isset($_POST["Origen"]) && isset($_POST["Destino"]) && isset($_POST["Peso"])) {
                $a = $_SESSION["grafo"]->addEdge($_POST["Origen"], $_POST["Destino"], $_POST["Peso"]);
                if ($a == false) {
                    echo 'El origen o el destino no se encuentra Regitrado';
                }
            }
            
            ?>"style="WIDTH: 240px; HEIGHT: 30px" size=32 disabled>
        </form>
    </center>
    <br>



    <center>

        <h2>Ver vertice</h2>

        <form action="index.php" method="post" id="Mostrar">
            <input type="text" name="VerVertice" placeholder="Indexado Vertice" id="VerVertice" required>
            <input type="button" value="Mostrar" id="Mostrar_vertice">
        </form>

    </center>
    <center>
        <h2>Ver adyacente</h2>

        <form action="index.php" method="post" id="Mostrar">
            <input type="text" name="VerAdyacente" placeholder="Indexado Vertice" id="VerAdyacentes" required>
            <input type="submit" value="Mostrar" id="MostrarAdyacentes">
            <input type="text" name="id" value="<?php 
            
            if (isset($_POST["VerAdyacente"])) {
                $x = ($_SESSION["grafo"]->getAdyacentes($_POST["VerAdyacente"]));
                if ($x == null) {
                    echo 'No Existen Adyacentes del Vértice Ingresado' ;
                } else {
                    echo "<span>" . $x . "</span>";
                }
            }
          
            
            ?>"style="WIDTH: 240px; HEIGHT: 30px" size=32 disabled>
        </form>
    </center>
    
    <br>
    <center>
        <h2>Ver grado</h2>

        <form action="index.php" method="post" id="Mostrar">
            <input type="text" name="VerGrado" placeholder="Indexado Vertice" required>
            <input type="submit" value="Mostrar">
            <input type="text" name="id" value="<?php 
            
            if (isset($_POST["VerGrado"])) {
                $grado = ($_SESSION["grafo"]->degrees($_POST["VerGrado"]));
                if ($grado != null) {
                    echo " El Grado del Vertice " . ($_POST["VerGrado"]) . " es:";
                    echo "<p>" . $_SESSION["grafo"]->degrees($_POST["VerGrado"]) . "</p>";
                } else {
                    echo 'El vértice no posee adyacentes o no se encuentra registrado';
                }
            }
            ?>"style="WIDTH: 240px; HEIGHT: 30px" size=32 disabled>
        </form>
    </center>
    <?php
   
    ?>



    <br>
    <center>
        <h2>Eliminar Punto Turistico</h2>

        <form action="index.php" method="post" id="Eliminar">
            <input type="text" name="EliminarVertice" placeholder="Indexado Vertice" required>
            <input type="submit" value="Eliminar">
            
        </form>
    </center>
    <br>
    <center>
        <h2>Eliminar Conexion</h2>
        <form action="index.php" method="post" id="Eliminar">
            <input type="text" name="OrigenA" placeholder="Origen" required>
            <input type="text" name="DestinoA" placeholder="Destino" required>
            <input type="submit" value="Eliminar">
        </form>
    </center>
    <br>

    <div>
        <div class>

            <h2>Ver el camino mas corto</h2>
            <form action="index.php" method="post" id="Mostrar">
                <input type="text" name="nodoA" placeholder="Ingrese el nodo Inicial" required>
                <input type="text" name="nodoB" placeholder="Ingrese el nodo Final" required>
                <input type="submit" value="Mostrar" id="mostrarCaminoCorto">
                <input type="text" name="id" value="<?php 
                 if (isset($_POST['nodoA']) && isset($_POST['nodoB'])) {
                    $C = $_SESSION["grafo"]->caminoMasCorto($_POST["nodoA"], $_POST["nodoB"]);
                    $C_S = implode("->", $C);
                    echo "El camino mas corto es: " . "<br>" . $C_S ;
                 }
            ?>" style="WIDTH: 240px; HEIGHT: 30px" size=32 disabled>
            </form>



            <div>
                <div>
                    <div>
                        <div>

                            <br>
                            <h2>Ver recorrido de anchura</h2>
                            <form action="index.php" method="post" id="recorridoAnchura">
                                <input type="text" name="NodoC" placeholder="Ingrese el nodo para ver su recorrido de anchura">
                                <input type="submit" value="Mostrar" id="mostrarRA">
                                <input type="text" name="id" value="<?php 
                                if (isset($_POST["NodoC"])) {
                                    $A = $_SESSION["grafo"]->BFS($_POST["NodoC"]);
                                    $A_S = implode("->", $A);
                                    echo "<p>El recorrido de anchura es: <br></p>";
                                    echo "<P>$A_S</P>";
                                }
                                 ?>"style="WIDTH: 240px; HEIGHT: 30px" size=32 disabled>
            </form>
                            
                           
                        </div>
                    </div>


                    <div>
                        <div>

                            <h2>Ver recorrido de profundidad</h2>
                            <form action="index.php" method="post" id="recorridoProfundidad">
                                <input type="text" name="NodoD" placeholder="Ingrese el nodo para ver su recorrido de profundidad">
                                <input type="submit" value="Mostrar" id="mostrarRP">
                                <input type="text" name="id" value="<?php 
                                if (isset($_POST["NodoD"])) {
                                    $B = $_SESSION["grafo"]->DFS($_POST["NodoD"]);
                                    $B_S = implode("->", $B);
                                    echo "<p> El recorrido de profundidad es:<br> </p>";
                                    echo "<p>$B_S</p>";
                                }
                                 ?>"style="WIDTH: 240px; HEIGHT: 30px" size=32 disabled>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>

            <?php

            if (isset($_POST["AgregarVertice"])) {
                $N = new Vertice($_POST["AgregarVertice"], $_POST["AgregarPrecio"], $_POST["AgregarCategoria"], $_POST["AgregarDuracion"]);
                $_SESSION["grafo"]->addVertex($N);
            }



           

            if (isset($_POST["OrigenA"]) && isset($_POST["DestinoA"])) {
                $B = $_SESSION["grafo"]->removeEdges($_POST["OrigenA"], $_POST["DestinoA"]);
                if (!$B) {
                    echo "<script language='javascript'>alert('Por favor Ingrese una Arista Valida');</script>";
                }
            }
            ?>
            <script>
                var vertice_anterior = null;
                var nodos = new vis.DataSet([
                    <?php
                    $p = count($_SESSION["grafo"]->getVectorV());
                    $cant = 0;
                    foreach ($_SESSION["grafo"]->getVectorV() as $i => $adya) {
                        $cant++;
                        if ($cant == $p) {
                            echo "{id: '$i', label: '$i'}";
                        } else {
                            echo "{id: '$i', label: '$i'},";
                        }
                    }
                    ?>
                ]);

                var aristas = new vis.DataSet([
                    <?php
                    $z = count($_SESSION["grafo"]->getMatrizA());
                    foreach ($_SESSION["grafo"]->getMatrizA() as $x => $ady) {
                        if ($ady != null) {
                            foreach ($ady as $y => $l) {
                                if ($x == null) {
                                    echo "{from: '$x', to: '$y', label: '$l'}";
                                } else {
                                    echo "{from: '$x', to: '$y', label: '$l'},";
                                }
                            }
                        }
                    }
                    ?>
                ]);

                var contenedor = document.getElementById("grafo1");

                var datos = {
                    nodes: nodos,
                    edges: aristas
                };
                var opciones = {
                    interaction: {
                        zoomView: false
                    },
                    nodes: {
                        borderWidth: 2,
                        borderWidthSelected: 10,
                        color: {
                            border: '#444444',
                            background: '#EDEDED',
                            highlight: {
                                border: '#000000',
                                background: '#EDEDED'

                            }
                        },
                        font: {
                            color: '#000000',
                            size: 16,
                        }
                    },
                    edges: {
                        color: {
                            inherit: false,
                            color: '#000000',
                            highlight: '#00FAF7',
                        },
                        arrows: {
                            to: {
                                enabled: true
                            }
                        }
                    }
                }
                var grafo = new vis.Network(contenedor, datos, opciones);
            </script>
            <script src="verVertice.js"></script>
        </div>
</body>
</html>
