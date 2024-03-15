<!DOCTYPE html>
<html>

<title> Listas Enlazadas Simples</title>
<head>
    <body>
        <h1> Agenda</h1>

            <?php
            include("Agenda.php");
            $Agenda = new Agenda();
            $contactoa = new Contacto ("Hector", "3002334342", "hector@gmail.com");
            $Agenda->agregarContactoFinal($contactoa);
            $contactob = new Contacto ("Sandra", "3020030230", "sandra@hotmail.com");
            $Agenda->agregarContactoPrincipio($contactob);
            $contactoc = new Contacto ("David", "21324562334", "David12@outlook.co");
            $Agenda->agregarContactoPrincipio($contactoc);
            echo $Agenda->VerContactos();

            $C = $Agenda->BuscarContacto("Sandra");
            if($C){
                echo "<br><hr>Elemento encontrado es -  Nombre: ". $C->getNombre()." - Numero: ". $C->getNumero() ." - Correo: ". $C->getCorreo();
            } else {
                echo  "<br><hr>Elemento no encontrado";
            }

            $E = $Agenda->EliminarContacto("Hector");
            if($E == true){
                echo "<br><hr>Elemento eliminado<br><hr>";

            } else {
                "<br><hr>Elemento no eliminado";
            }
            echo "<br><hr> ".$Agenda->VerContactos();
            ?>
    </body>
</html>