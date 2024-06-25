<!DOCTYPE html>
<html lang="en">
<head>

    <?php
      require 'funcionalidad.php';
      $idCorreo = $_GET['id'];

      $Abrir = $_GET['marcarAbrir'];

      $correo = abrirMensajes($idCorreo, $Abrir);
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="author" content="Alejandro Paniagua López">
    <meta name="description" content="Página de inicio de WhispWire">

    <title>WhispWire | Mail</title>

    <link rel="stylesheet" type="text/css" href="../css/vist.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <style>
      body{
        background-image: url("../img/fondoBandeja.jpg");
        background-size: cover;
      }
    </style>

</head>
<body>
  <div class="container-fluid">
    <div class="mt-3 row">
      <div class="container">
        <div class="bandejaCorreo">
          <div class="row align-items-center" id="navCorreo">
            <div class="col-md-auto col-lg-auto d-none d-md-block">
              <img src="../img/logo.png" class="img-fluid" alt="Logo" id="logo">
            </div>
            <div class="col-md-auto col-lg-auto">
              <h4 id="textoLogo">WhispWire</h4>
            </div>
            <div class="col align-self-end">
              <div class="d-flex justify-content-end align-items-end">
                <a href="borrarCorreo.php?id=<?php echo $idCorreo; ?>"><img src="../img/papelera.png" class="img-fluid" alt="papelera" id="papelera"></a>
                <div class="xCorreo">
                  <a href="bandejaDeEntrada.php?modo=recibidos"><button type="button" class="btn-close" aria-label="Close"></button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="ms-5 container">
            <div class="mt-5 row align-items-center">
              <div class="col-md-auto col-lg-auto">
                <img src="../img/usuario.png" class="img-fluid" alt="Logo" id="imgUsuario">
              </div>
              <div class="mt-2 col-md-auto col-lg-auto">
                <p class="fs-5"><?php echo "De: ".$correo['Emisor']."<br>"; echo "<p>Para: ".$correo['Receptor']. "</p>"; ?></p>
              </div>
              <div class="me-5 col mt-3">
                <div class="me-5 d-flex justify-content-end align-items-end">
                <p class="fs-5" id="fechaCorreo"><?php echo $correo['Fecha'] ?></p>
                </div>
              </div>
            </div>
            <div class="mt-5 row align-items-center">
              <div class="col-md-auto col-lg-auto">
                <p class="fs-3"><?php echo $correo['Asunto']; ?></p>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="textoMensaje">
                  <p class="fs-6"><?php echo $correo['Mensaje']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>