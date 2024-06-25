<?php

    function comprobarUsuario($name){
        
        $db = new mysqli('localhost', 'root', '', 'whispwire');
        $consultar = "SELECT usuario, contraseña FROM usuarios WHERE usuario LIKE '". $name. "'";
        $consulta = $db->query($consultar);

        $resultado = $consulta->fetch_assoc();
        @mysqli_close($db);

        if(isset($resultado)){

            return true;
        }
        else{

            return false;
        }
    }

    function consultarMensajes($modo, $usuario, $busqueda){

        $db = new mysqli('localhost', 'root', '', 'whispwire');

        if($modo == "recibidos"){
            $consultar = "SELECT * FROM `mensajes` WHERE `Receptor` LIKE '$usuario' ORDER BY fecha DESC";
        }
        else if($modo == "enviados"){
            $consultar = "SELECT * FROM `mensajes` WHERE `Emisor` LIKE '$usuario' ORDER BY fecha DESC";
        }
        else if($modo == "buscar"){
            $consultar = "SELECT * FROM `mensajes` WHERE `Emisor` LIKE '$busqueda' AND `Receptor` LIKE '$usuario'";
        }

        $consulta = $db->query($consultar);

        @mysqli_close($db);

        return $consulta;
    }

    function consultarUsuarios(){

        $db = new mysqli('localhost', 'root', '', 'whispwire');
        $consultar = "SELECT * FROM `usuarios` WHERE `usuario` NOT LIKE 'admin'";

        $consulta = $db->query($consultar);

        @mysqli_close($db);

        return $consulta;
    }

    function abrirMensajes($id, $marcarAbrir){

        $db = new mysqli('localhost', 'root', '', 'whispwire');
        $consultar = "SELECT * FROM `mensajes` WHERE `Id` = $id";
        $consulta = $db->query($consultar);

        $resultado = $consulta->fetch_assoc();

        if($marcarAbrir == "1"){

            $modLeido = "UPDATE `mensajes` SET `Abierto` = '1' WHERE `mensajes`.`Id` = $id";

            $consulta2 = $db->query($modLeido);
        }

        @mysqli_close($db);

        return $resultado;
    }

?>