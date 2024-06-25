<?php

// en este caso ssesion se utiliza para saber que usuario a mandado el mensaje y asi colocarlo como emisor de este
    session_start();
    if(isset($_SESSION['user'])){
        $emisor = $_SESSION['user'];
    }

    require 'funcionalidad.php';


    $db = new mysqli('localhost', 'root', '', 'whispwire');

        $receptor = $_POST['receptor'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $fecha = date("Y/m/d");

        if(comprobarUsuario($receptor)){

            $consulta = "INSERT INTO `mensajes` (`Id`, `Emisor`, `Receptor`, `Asunto`, `Mensaje`, `Fecha`, `Abierto`) VALUES (NULL, '".$emisor."', '".$receptor."', '".$asunto."', '".$mensaje."', '".$fecha."', '0');";
            $consultado = $db->query($consulta);

            header("Location: bandejaDeEntrada.php?modo=enviados");
        }
        else{
            header("Location: bandejaDeEntrada.php?error=error&modo=enviados");
        }

    @mysqli_close($db);

?>