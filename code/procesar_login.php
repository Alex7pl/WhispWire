<?php

$db = new mysqli('localhost', 'root', '', 'whispwire');

$nombre = $_POST['user'];
$contraseña = $_POST['password'];
$recuerdame = $_POST['recuerdame'];

$consultar = "SELECT Usuario, Contraseña FROM usuarios WHERE Usuario LIKE '". $nombre. "'";
$consulta = $db->query($consultar);
$resultado = $consulta->fetch_assoc();

if(isset($resultado)){

    if($resultado['Contraseña'] == $contraseña){
        session_start();

        $_SESSION['user'] = $nombre;

        if($recuerdame == "si"){
            $_SESSION['rec'] = $recuerdame;
        }

        if($nombre == "admin"){
            header("Location: bandejaDeAdmin.php");
        }
        else{
            header("Location: bandejaDeEntrada.php?modo=recibidos");
        }
    }
    else{
        header("Location: login.php?error=errorContraseña");
    }
}
else{
    header("Location: login.php?error=errorUsuario");
}

@mysqli_close($db);

?>