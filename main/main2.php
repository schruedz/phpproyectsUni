<?php

include("Agenda.php");
session_start();
if (isset($_SESSION["Lista"]) == false) {
    $_SESSION["Lista"] = new Agenda();
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
        $n = new Contacto($_POST[""]);
        $_SESSION["Lista"]->agregarContactoPrincipio($n);
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
        $n = new Contacto($_POST["". "".""]);
        $_SESSION["Lista"]->agregarContactoFinal($n);
    }
    ?>

    Buscar
    <form action="main2.php" method="post">
        <input type="text" name="Buscar">
        <input type="submit" value="Buscar">
    </form>
    <?php
    if (isset($_POST["Buscar"])) {
        $B = $_SESSION["Lista"]->BuscarContacto($_POST["Buscar"]);
        if ($B != null) {
            echo "<br><hr>Elemento encontrado es: " . $B->getNombre(). $B->getNumero(). $B->getCorreo();
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
        $E = $_SESSION["Lista"]->EliminarContacto($_POST["Eliminar"]);
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

    echo $_SESSION["Lista"]->VerContactos();
    ?>

</body>

</html>