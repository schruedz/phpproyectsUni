<!DOCTYPE html>
<html>

<title> Listas Enlazadas Simples</title>
<head>
    <body>
        <h1> Listas Enlazadas Simples</h1>

            <?php
            include("listasimple.php");
            $ListaDiasSemana = new ListaSimple();
            $Domingo = new Nodo ("Domingo");
            $ListaDiasSemana->agregarNodoPrincipio($Domingo);
            $Sabado = new Nodo ("Sabado");
            $ListaDiasSemana->agregarNodoPrincipio($Sabado);
            $Viernes = new Nodo ("Viernes");
            $ListaDiasSemana->agregarNodoPrincipio($Viernes);
            $Lunes = new Nodo ("Lunes");
            $ListaDiasSemana->agregarNodoFinal($Lunes);
            echo $ListaDiasSemana->VisualizarListas();

            $C = $ListaDiasSemana->NodoBuscar("Lunes");
            if($C != null){
                echo "<br><hr>Elemento encontrado es: ". $C->getInfo();
            } else {
                echo  "<br><hr>Elemento no encontrado";
            }
            $E = $ListaDiasSemana->Eliminar("Domingo");
            if($E == true){
                echo "<br><hr>Elemento eliminado";

            } else {
                "<br><hr>Elemento no eliminado";
            }
            echo "<br><hr> ".$ListaDiasSemana->VisualizarListas();
            ?>
    </body>
</html>