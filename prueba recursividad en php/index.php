<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<?php
include("metodo.php");

?>
<head>
    <title>Recursividad Factorial</title>
    <h1>Factorial de un número</h1>
    <div class="main">
       
        <br>
        <form action="index.php" method="POST"> <br>
            <p>Introduce un numero : <input type="text" name="num1"></p> <br>
            <input type="submit" value="submit" name="enviar"> <br>
        </form>

        <br>
        <?php

if(isset($_POST["num1"])){
    $resultado= factorial($_POST["num1"]);
    
    echo "El resultado es ". $resultado;
}

?>
    </div>



<body>

</body>

</html>