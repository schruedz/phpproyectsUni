<?php
include("multilista.php");
session_start();
if (!isset($_SESSION["multilista"])) {
    $_SESSION["multilista"] = new Mmultilista;
}
?>
<!DOCTYPE html>


<head>
    <title>Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="form-register">
        <h4>Agregar Editorial</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="AIdEditorial" placeholder="Id">
            <input class="controls" type="text" name="ADenominacion" placeholder="Denominación">
            <input class="botons" type="submit" value="Agregar">
        </form>
    </section>


    <br>
    <hr>
    <?php
    if (isset($_POST["AIdEditorial"], $_POST["ADenominacion"])) {
        $E = new NodoEditorial($_POST["AIdEditorial"], $_POST["ADenominacion"]);
        $_SESSION["multilista"]->AgregarEditorial($E);

        echo "<center> <h3>Editorial agregada satifactoriamente! <br><hr>";
    }
    ?>
    <section class="form-register">
        <h4>Buscar editorial</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="BuscarEditorial" placeholder="Ingresar Id">
            <input class="botons" type="submit" value="Buscar">
        </form>
    </section>

    <?php
    if (isset($_POST["BuscarEditorial"])) {
        $B = $_SESSION["multilista"]->BuscarEditorial($_POST["BuscarEditorial"]);
        if ($B != null) {
            echo "<center> <h3><br><hr>El elemento encontrado es: -" . $B->getDenominacion() . "- Id: -" . $B->getIdEditorial() . "-";
        } else {
            echo "<center><h3> El elemento No fue Encontrado<br><hr>";
        }
    }
    ?>
    <br>
    <hr>



    <section class="form-register">
        <h4>Agregar libro</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="AIdLibro" placeholder="Id">
            <input class="controls" type="text" name="ATitulo" placeholder="Titulo">
            <input class="controls" type="text" name="AAutor" placeholder="Autor">
            <input class="controls" type="text" name="APais" placeholder="Pais">
            <input class="controls" type="text" name="AAno" placeholder="Año">
            <input class="controls" ype="text" name="ACantidad" placeholder="Cantidad">
            <input class="controls" type="text" name="IdEditorialAgre" placeholder="Id Editorial">
            <input class="botons" type="submit" value="Agregar">
        </form>
    </section>

    <?php
    if (isset($_POST["AIdLibro"])) {
        $NL = new NodoLibro($_POST["AIdLibro"], $_POST["ATitulo"], $_POST["AAutor"], $_POST["APais"], $_POST["AAno"], $_POST["ACantidad"], $_POST["IdEditorialAgre"]);
        $_SESSION["multilista"]->AgregarLibro($NL, $_POST["IdEditorialAgre"]);
        echo "<center> <br><hr><h3>Libro agregado satifactoriamente! <br><hr>";
    }
    ?>
    <hr>
    <section class="form-register">
        <h4>Eliminar libro</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="EliminarIdLibro" placeholder="Id Libro">
            <input class="controls" type="text" name="EliminarIdEdi" placeholder="Id Editorial">
            <input class="botons" type="submit" value="Eliminar">
        </form>
    </section>


    <?php
    if (isset($_POST["EliminarIdEdi"])) {
        $_SESSION["multilista"]->EliminarLibro($_POST["EliminarIdLibro"], $_POST["EliminarIdEdi"]);
        echo "<center> <br><hr><h3>Libro eliminado satifactoriamente! <br><hr>";
    }
    ?>
    <br>
    <section class="form-register">
        <h4>Eliminar Editorial</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="EliminarEditorial1" placeholder="Id Editorial">
            <input class="botons" type="submit" value="Eliminar">
        </form>
    </section>

    <?php
    if (isset($_POST["EliminarEditorial1"])) {
        $_SESSION["multilista"]->EliminarEditorial($_POST["EliminarEditorial1"]);
        echo "<center> <h3>Editorial eliminada satifactoriamente! <br><hr>";
    }
    ?>

    </div>

    <section class="form-register">
        <h4>Buscar libro</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="Buscar_libro" placeholder="Id Libro">
            <input class="controls" type="text" name="encontrar_editorial" placeholder="Id Editorial">
            <input class="botons" type="submit" value="Buscar">
        </form>
    </section>

    <?php
    if (isset($_POST["Buscar_libro"])) {
        $Z = $_SESSION["multilista"]->BuscarLibro($_POST["encontrar_editorial"], $_POST["Buscar_libro"]);
        if ($Z != null) {
            echo "<center> <br><br><hr><h3> El elemento encontrado es: | " . $Z->getTitulo() . " | Con Id: " . $Z->getIdLibro() . " | Cantidad:" . $Z->getCantidad();
        } else {
            echo "<center> <h3> El elemento No fue Encontrado <br><hr>";
        }
    }
    ?>
    <br>
    <hr>

    <section class="form-register">
        <h4> Información Libro</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="InfoLibro" placeholder="Id Libro">
            <input class="controls" type="text" name="InfoEdit" placeholder="Id Editorial">
            <input class="botons" type="submit" value="Buscar">
        </form>
    </section>

    <?php
    if (isset($_POST["InfoLibro"])) {
        $Z = $_SESSION["multilista"]->verDetallesLibro($_POST["InfoEdit"], $_POST["InfoLibro"]);
        if ($Z != null) {
            echo "<center> <br><hr><h3>  El elemento encontrado es: " . $Z . "<br>";
        } else {
            echo "<center> <h3> El elemento No fue Encontrado <br>";
        }
    }
    ?>

    <br>
    <hr>
    <section class="form-register">
        <h4> Libros por Año</h4>
        <form action="index.php" method="post">
            <input class="controls" type="number" name="año" placeholder="Año" required>
            <input class="botons" type="submit" name="calculo" value="Calcular">
        </form>
    </section>

    <?php
    if (isset($_POST["calculo"])) {
        $año = $_REQUEST['año'];
        $cantidad = $_SESSION['multilista']->LibrosPorAño($año);
        if ($cantidad > 0) {
            echo ("<center> <br><hr><h3> La cantidad de libros publicados en el año $año es $cantidad<br><hr>");
        } else {
            echo ("<center> <h3> No hay ningún libro publicado en el año $año<br><hr>");
        }
    }
    ?>
    <br>
    <section class="form-register">
        <h4>Libro por Editorial</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="editorial" placeholder="Id Editorial" required>
            <input class="botons" type="submit" name="FiltrarEditorial" value="Calcular">
        </form>
    </section>

    <?php
    if (isset($_POST["FiltrarEditorial"])) {
        $editorial = $_REQUEST['editorial'];
        $cantidad = $_SESSION['multilista']->LibrosPorEditorial($editorial);
        if ($cantidad > 0) {
            echo ("<center> <br><hr><h3> La cantidad de libros publicados en la editorial $editorial es $cantidad");
        } else {
            echo ("<center> <br><hr><h3> No hay ningún libro publicado en la editorial $editorial");
        }
    }
    ?>
    <br>
    <hr>
    <section class="form-register">
        <h4>Actualizar inventario</h4>
        <form action="index.php" method="post">
            <input class="controls" type="text" name="id_Libro" placeholder="id del libro">
            <input class="controls" type="text" name="nombre_editorial" placeholder="Id Editorial">
            <input class="controls" type="number" name="nuevo_valor" placeholder="Libros disponibles">
            <input class="botons" type="submit" name="Actualizar_inventario" value="Actualizar" onclick="location.reload()">
        </form>
    </section>
    <?php
    if (isset($_POST["Actualizar_inventario"])) {
        $_SESSION["multilista"]->ActualizarInventario($_POST["nombre_editorial"], $_POST["id_Libro"], $_POST["nuevo_valor"]);
        echo "<center> <br><hr><h3>Inventario actualizado satifactoriamente! <br><hr>";
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <center>
        <section class="Mostrar_section">
            <hr><br>
            <h1> Imprimir Biblioteca</h1>
            <div class="Mostrar">
                <?php
                $Mensaje = $_SESSION["multilista"]->mostrarMultilista();
                echo "<h5><br>$Mensaje";
                ?>
                <br>
                <hr>

                <center>
                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>


</body>

</html>