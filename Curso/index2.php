<?php
class Pagina {
				//Atributos
				public $nombre = "Codigo Facilito";  
				public static $url = "www.codigofacilito.com";
		
				//Metodos
				public function bienvenida ()
					{
						echo "Bienvenidos a <b>". $this->nombre ."</b> la pagina es <b>". self::$url."<b>";
					}
				public static function bienvenida2 ()
					{
						echo "Bienvenidos ". self::$url;
					}

			}
class Web extends Pagina{

			}

/* llamado 1
$pagina = new Pagina();
$pagina->bienvenida();
*/
/* Llamado 2 (metodo estatico) sin llamar la clase y esta heradado */
Web::bienvenida2();


?>