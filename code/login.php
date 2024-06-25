<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="author" content="Alejandro Paniagua López">
    <meta name="description" content="Página de inicio de WhispWire">

    <title>WhispWire | Mail</title>

    <link rel="stylesheet" type="text/css" href="../css/vist.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <div class="mt-5 row justify-content-center" id="filaLogin">
        <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
            <div id="formu">
                <form action="procesar_login.php" method="post">
                    <div class="form-signin-heading">
                        <p class="fs-3">WhispWire</p> 
                        <p class="fs-5">Iniciar sesión</p>
                    </div>
                    <div class="mb-3">
                        <label for="Usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="user" placeholder="Usuario" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="si" name="recuerdame">
                            <label class="form-check-label" for="recuerdame">Recuérdame</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Gestiona posibles errores que le llegan de procesar_login -->
    <div class="mt-5 row justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
            <?php
                if(isset($_GET["error"]) && $_GET["error"] == "errorUsuario") {
            ?>
            <div class="alert alert-danger" role="alert">No existe el usuario escrito</div>
            <?php
                }else if(isset($_GET["error"]) && $_GET["error"] == "errorContraseña"){
            ?>
            <div class="alert alert-danger" role="alert">La contraseña escrita es errónea</div>
            <?php
                }else{}
            ?>
        </div>
    </div>
  </div>
</body>
</html>