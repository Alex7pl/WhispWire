<?php

    $id = $_GET['id'];

    $db = new mysqli('localhost', 'root', '', 'whispwire');
    $consultar = "DELETE FROM mensajes WHERE `mensajes`.`Id` = $id";
    $consulta = $db->query($consultar);

    @mysqli_close($db);

    header("Location: bandejaDeEntrada.php?modo=recibidos");

?>