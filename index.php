<?php
// Función necesaria para guardar la sesión del usuario
  session_start();

  if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
    if(isset($_SESSION['rec'])){
      header("Location: code/bandejaDeAdmin.php");
    }
  }
  else if(isset($_SESSION['user'])){
    if(isset($_SESSION['rec'])){
      header("Location: code/bandejaDeEntrada.php?modo=recibidos");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="author" content="Alejandro Paniagua López">
    <meta name="description" content="Página de inicio de WhispWire">

    <title>WhispWire | Mail</title>

    <link rel="stylesheet" type="text/css" href="./css/vist.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
  <div class="container-fluid">
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded row align-items-center">
      <div class="ms-5 me-5 col-lg-1 d-none d-lg-block">

      </div>
      <div class="col-md-auto col-lg-auto d-none d-md-block">
        <img src="img/logo.png" class="img-fluid" alt="Logo" id="logo">
      </div>
      <div class="col-md-auto col-lg-auto">
        <h4 id="textoLogo">WhispWire</h4>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-7 d-none d-md-block">
        <div class="d-flex justify-content-end align-items-end">
          <a href="./code/login.php"><button type="button" class="btn btn-outline-secondary">Inicia Sesión</button></a>
          <div class="boton ms-1">
            <a href="./code/register.php"><button type="button" class="btn btn-outline-secondary">Crear una cuenta</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5 row align-items-center">
      <div class="col-md-2 col-lg-2 col-xl-2">

      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <p class="fs-1 text-justify">CORREO ELECTRÓNICO FÁCIL Y SEGURO</p>
        <p class="fs-5 text-justify">
          Correo electrónico sencillo he intuitivo que te ayudará en
          tus tareas diarias. Únete a la gran comunidad de gente que usa WhispWire
          y disfruta de todas sus ventajas.
        </p>
        <a href="./code/login.php"><button type="button" class="btn btn-outline-secondary">Inicia Sesión</button></a>
        <div class="boton mt-1">
        <a href="./code/register.php"><button type="button" class="btn btn-outline-secondary">Crear una cuenta</button></a>
        </div>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <img src="img/fotoInicio.png" class="img-fluid" alt="Logo" id="fInicio">
      </div>
      <div class="col-md-2 col-lg-2 col-xl-2">

      </div>
    </div>
  </div>
</body>
</html>