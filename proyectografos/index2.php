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

    <div class="form-group text-center">
        <h2>Cargar archivo JSON</h2>

        <form action="index2.php" enctype="multipart/form-data" method="POST" id="UploadFileGraph">
            <input type="file" name="archivo" placeholder="Archivo" style="min-width: 300px;" required>
            <input type="hidden" name="opcion" value="cargar_json">
            <input type="submit" value="Cargar Archivo">
        </form>
    </div>
    <center>
        <input type="submit" name="admin" onclick="location.href='index.php'" value="Admin">
        <h2>Portal Usuario</h2>

        <form action="index2.php" method="post" id="Agregar">
            <br>
            <div>
                <h2>Mostrar ruta turistica</h2>
                <form action="index2.php" method="post" id="recorrido">
                    <input type="text" name="NodoD" placeholder="Ubicación inicial">
                    <input type="submit" value="Mostrar" id="mostrarRP">
                </form>
                <?php
                            if (isset($_POST["NodoD"])) {
                                $B = $_SESSION["grafo"]->BFS($_POST["NodoD"]);
                                $B_S = implode("->", $B);
                                echo "<p> La ruta turistica de la ubicación: ". $_POST["NodoD"]. " es <br> </p>";
                                echo "<p>$B_S</p>";
                            }
                            ?>
                <div class>
                    <h2>Ver ruta más corta</h2>
                    <form action="index2.php" method="post" id="Mostrar">
                        <input type="text" name="nodoA" placeholder="Ubicación inicial" required>
                        <input type="text" name="nodoB" placeholder="Destino" required>
                        <input type="submit" value="Mostrar" id="mostrarCaminoCorto">
                    </form>



                    <?php
                    if (isset($_POST['nodoA']) && isset($_POST['nodoB'])) {
                        $C = $_SESSION["grafo"]->caminoMasCorto($_POST["nodoA"], $_POST["nodoB"]);
                        $C_S = implode("->", $C);
                        echo "<p>La ruta para llegar al destino más rápido es: " . "<br>" . $C_S . "</p>";
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


        </form>

    </center>
    <br>