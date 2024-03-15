<?php

include("listasimple.php");
session_start();
if (isset($_SESSION["Lista"]) == false) {
    $_SESSION["Lista"] = new ListaSimple();
}



?>
<!DOCTYPE html>
<html>

<title> Listas Enlazadas Simples</title>

<head>

<body>
    <h1> Listas Enlazadas Simples</h1>

    Agregar item al inicio:
    <form action="main2.php" method="post">
        <input type="text" name="AgregarInicio">
        <input type="submit" value="Agregar">
    </form>

    <?php
    if (isset($_POST["AgregarInicio"])) {
        //echo "<br>".$_POST["agregarinicio"];
        $n = new Nodo($_POST["AgregarInicio"]);
        $_SESSION["Lista"]->agregarNodoPrincipio($n);
    }
    ?>
    Agregar item al Final:
    <form action="main2.php" method="post">
        <input type="text" name="AgregarFinal">
        <input type="submit" value="Agregar">
    </form>
    <?php
    if (isset($_POST["AgregarFinal"])) {
        //echo "<br>".$_POST["agregarinicio"];
        $n = new Nodo($_POST["AgregarFinal"]);
        $_SESSION["Lista"]->agregarNodoFinal($n);
    }
    ?>

    Buscar
    <form action="main2.php" method="post">
        <input type="text" name="Buscar">
        <input type="submit" value="Buscar">
    </form>
    <?php
    if (isset($_POST["Buscar"])) {
        $B = $_SESSION["Lista"]->NodoBuscar($_POST["Buscar"]);
        if ($B != null) {
            echo "<br><hr>Elemento encontrado es: " . $B->getInfo();
        } else {
            echo  "<br><hr>Elemento no encontrado";
        }
    }
    ?>
    Eliminar
    <form action="main2.php" method="post">
        <input type="text" name="Eliminar">
        <input type="submit" value="Eliminar">
    </form>
    <?php
    if (isset($_POST["Eliminar"])) {
        $E = $_SESSION["Lista"]->Eliminar($_POST["Eliminar"]);
        if($E == true){
            echo "<br><hr>Elemento eliminado";

        } else {
            "<br><hr>Elemento no eliminado";
        }
    }
    ?>
    <br>
    <hr>
    <?php

    echo $_SESSION["Lista"]->VisualizarListas();
    ?>

</body>

</html>