<?php


    $search = $_POST['buscar'];

    header("Location: bandejaDeEntrada.php?modo=buscar&aBuscar=$search");

?>