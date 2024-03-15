<!DOCTYPE html>


<head>


    <script type="text/javascript" src=" vis/dist/vis.js"></script>
    <link rel="stylesheet" href="style/Style.css">

    <title>Grafos</title>
</head>

<body>

    <?php
    include("grafo.php");
    session_start();
    if (!isset($_SESSION["grafo"])) {
        $_SESSION["grafo"] = new grafo();
    }
    ?>
    <header>

        <br>
        <center>
            <h1>Visualización</h1>
        </center>
        <br>
    </header>
    <div class="grafo1" id="grafo1"></div>
    <br>

    <center>
        <h2>Agregar Punto Turistico</h2>

        <form action="index2.php" method="post" id="Agregar">
            <br>
            <input type="text" name="AgregarVertice" placeholder="Ubicacion inicial" required>

            <input type="text" name="AgregarPrecio" placeholder="Categorias favortas al visitar" required>

            <input type="text" name="AgregarCategoria" placeholder="Tiempo Disponible" required>
            <br>
            <input type="submit" value="Mostrar rutas turisticas">

            <br>
            <input type="submit" name="admin" onclick="location.href='index.php'" value="Admin">




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