<?php
    require 'grafo.php';
    session_start();
    if (!isset($_SESSION["grafo"])) {
        echo "No hay grafo para guardar";
        exit();
    }
    $grafo = $_SESSION["grafo"];
    $json = $grafo->toJson();

    header('Content-Disposition: attachment; filename="grafo.json"');
    header('Content-Type: application/json'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
    header('Content-Length: ' . strlen($json));
    header('Connection: close');

    echo $json;
?>