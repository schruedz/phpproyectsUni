<!DOCTYPE html>
<html>
    <head>
        <title>Algoritmo 1 </I></title>
    </head>
    <body>

        <?php
            class Persona {
                //Atributos
                public $nombre = "Pedro";



                //Metodos
                public function hablar ($mensaje){
                    echo $mensaje;


                }

            }
            $persona = new Persona();
            echo $persona ->nombre; //Extraer nombre
            echo $persona ->hablar("Hola, ¿Cómo estás?");

        ?>

    </body>
</html>