<?php

$nombre = $_POST['user'];
$contraseña = $_POST['password'];
$rep = $_POST['passwordRep'];
$admin = $_GET['admin'];

$consultar = "INSERT INTO `usuarios` (`Usuario`, `Contraseña`) VALUES ('$nombre', '$contraseña')";
// lógica del registro, con try-catch, diferencia entre si el registro lo ha llevado un admin o un usuario a cabo para volver a la pagina de inicio o en el caso de ser
// un admin, a la bandeja de admin
if($contraseña == $rep){

    try{

        $db = new mysqli('localhost', 'root', '', 'whispwire');

        $db->query($consultar);
        if($admin == "si"){
            header("Location: bandejaDeAdmin.php");
        }
        else{
            header("Location: ../index.php?mensaje=okey");
        }
    }
    catch(Exception $e){
        if($admin == "si"){
            header("Location: bandejaDeAdmin.php?error=errorInsertar");
        }
        else{
            header("Location: register.php?error=errorInsertar"); 
        }
    }
}
else{
    if($admin == "si"){
        header("Location: bandejaDeAdmin.php?error=error");
    }
    else{
        header("Location: register.php?error=errorContraseña");
    }
}

@mysqli_close($db);

?>