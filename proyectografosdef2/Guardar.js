var btn = document.getElementById("Guardar");
var grafo = grafo.getElementById("grafo1");

    function Guardar(){
    $json_grafos = json_encode($_SESSION["grafo"].getMatrizA());

    var_dump($json_grafos);

    $handler = fopen("grafos.json", "w+");

    fwrite($handler, $json_grafos);

    fclose($handler);


}


btn.addEventListener("click",Guardar(),true)