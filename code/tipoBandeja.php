<?php
// Para que pase de un tipo de bandeja a otro mediante metodo $_GET
$tipo = $_POST['tipo'];

if($tipo == "aEnviados"){
    header("Location: bandejaDeEntrada.php?modo=enviados");
}
else if($tipo == "aRecibidos"){
    header("Location: bandejaDeEntrada.php?modo=recibidos");
}

?>