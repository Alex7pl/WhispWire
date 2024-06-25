<?php

    $usuarios = $_POST['seleccion'];

    $db = new mysqli('localhost', 'root', '', 'whispwire');

    for($i = 0; $i < count($usuarios); $i++){

        $consultar = "DELETE FROM usuarios WHERE `Usuario` = '".$usuarios[$i]."'";
        $consulta = $db->query($consultar);

        $consulta = "DELETE FROM mensajes WHERE Emisor = '$usuarios[$i]' OR Receptor = '$usuarios[$i]'";
    }

    @mysqli_close($db);
    header("Location: bandejaDeAdmin.php");
?>