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
                <!-- formulario de registro -->
                <form action="procesar_register.php" method="post" id="loginForm">
                    <div class="form-signin-heading">
                        <p class="fs-3">WhispWire</p> 
                        <p class="fs-5">Regístrate</p>
                    </div>
                    <div class="mb-3">
                        <label for="Usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="user" placeholder="Usuario" required autofocus>
                        <div id="user" class="form-text">El nombre de usuario que utilizarás para que otra gente te conozca.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Repita la contraseña</label>
                        <input type="password" class="form-control" name="passwordRep" placeholder="ContraseñaRep" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Gestiona los errores posibles que le llegan desde procesar_register.php para que salte una alerta en caso afirmativo -->
    <div class="mt-5 row justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
            <?php
                if(isset($_GET["error"]) && $_GET["error"] == "errorInsertar") {
            ?>
            <div class="alert alert-danger" role="alert">No se ha podido crear el nuevo usuario</div>
            <?php
                }else if(isset($_GET["error"]) && $_GET["error"] == "errorContraseña"){
            ?>
            <div class="alert alert-danger" role="alert">Las contraseñas escritas no coinciden</div>
            <?php
                }else{}
            ?>
        </div>
    </div>
  </div>
</body>
</html>