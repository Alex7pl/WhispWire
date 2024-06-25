<!DOCTYPE html>
<html lang="en">
<head>

    <?php
      require 'funcionalidad.php';
      session_start();
      if(isset($_SESSION['user'])){
          $user = $_SESSION['user'];
      }

      // Logica que obtiene el modo en el que te encuentras, permite marcar los correos como leidos si te encuentras en recibidos y guarda los correos a buscar

      $modo = $_GET['modo'];

      $marcarAbrir = ($modo == "recibidos" || $modo == "buscar") ? "1" : "0";

      if(isset($_GET['aBuscar'])){
        $aBuscar = $_GET['aBuscar'];
      }
      else{
        $aBuscar = "Nada";
      }
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
        background-color: #f5f5f5;
      }
    </style>

      <!-- Gestion de errores -->
    <?php
      if(isset($_GET['error']) && $_GET['error'] == "error"){
    ?>
    <script>
      window.alert("Se ha producido un error");
    </script>
    <?php } ?>
</head>
<body>
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-auto col-lg-auto d-none d-md-block">
        <img src="../img/logo.png" class="img-fluid" alt="Logo" id="logo">
      </div>
      <div class="col-md-auto col-lg-auto">
        <h4 id="textoLogo">WhispWire</h4>
      </div>
      <div class="col-md-4 col-lg-4 col-xl-4">
        <form class="d-flex" role="search" action="buscarCorreos.php" method="post">
            <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar un correo" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Buscar</button>
        </form>
      </div>
      <div class="col align-self-end">
        <div class="d-flex justify-content-end align-items-end" id="navBE">
          <a href="cerrarSesion.php"><button type="button" class="btn-close" aria-label="Close"></button></a>
        </div>
      </div>
    </div>
    <div class="mt-3 row">
      <div class="col-md-2">
        <div class="sidebar">
          <button type="button" id="botonR" class="btn btn-secondary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#redactarM">Redactar</button>
          <!-- Modal para redactar un nuevo correo -->
          <div class="modal fade" id="redactarM" tabindex="-1" aria-labelledby="redactar" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="NM">Nuevo Mensaje</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="procesar_nuevo_mensaje.php" method="post">
                    <div class="mb-3">
                      <label for="Para" class="form-label">Para</label>
                      <input type="text" class="form-control" name="receptor" placeholder="Para" required autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="Asunto" class="form-label">Asunto:</label>
                      <input type="text" class="form-control" name="asunto" placeholder="Asunto" required autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="Mensaje" class="form-label">Mensaje:</label>
                      <textarea class="form-control" name="mensaje" rows="7"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Permite cambiar entre los diferentes modos con dos botones -->
          <?php
            if($modo == "recibidos" || $modo == "buscar"){
          ?>
          <button type="button" class="mt-4 btn btn btn-secondary w-100" disabled>Recibidos</button>
          <form method="POST" action="tipoBandeja.php">
            <input type="hidden" name="tipo" value="aEnviados">
            <button type="submit" class="mt-1 btn btn-outline-light btn-transparent text-dark w-100">Enviados</button>
          </form>
          <?php
            }else{
          ?>
          <div class="mt-4">
            <form method="POST" action="tipoBandeja.php">
              <input type="hidden" name="tipo" value="aRecibidos">
              <button type="submit" class="btn btn-outline-light btn-transparent text-dark w-100">Recibidos</button>
            </form>
          </div>
          <button type="button" class="mt-1 btn btn btn-secondary w-100" disabled>Enviados</button>
          <?php
            }
          ?>
        </div>
      </div>
      <div class="col-md-10">
        <!-- Logica para mostrar los correos pertinentes en la bandeja de entrada -->
        <div class="bandejaEntrada">
          <div class="table-responsive">
            <table class="table table-hover" id="tablaNormal">
              <thead>
                <tr>
                  <?php if($modo == "enviados") { ?>
                    <th>Para</th>
                  <?php } else{ ?>
                    <th>Emisor</th>
                  <?php } ?>
                  <th>Asunto</th>
                  <th>Fragmento de texto</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php $mensajes = consultarMensajes($modo, $user, $aBuscar); ?>
                <?php while($row = $mensajes->fetch_assoc()) { ?>
                  <tr onclick="window.location='correo.php?id=<?php echo $row['Id']; ?>&marcarAbrir=<?php echo $marcarAbrir; ?>'" <?php if ($row['Abierto'] == "1") echo 'class="table-dark-row"'; ?>>
                    <td><?php if($modo == "enviados") {echo $row['Receptor'];} else{echo $row['Emisor'];} ?></td>
                    <td><?php echo $row['Asunto']; ?></td>
                    <td>
                      <?php 
                        $words = explode(" ", $row['Mensaje']);
                        $selected_words = array_slice($words, 0, 10);
                        $new_string = implode(" ", $selected_words);
                        echo $new_string."..."; 
                      ?>
                    </td>
                    <td><?php echo $row['Fecha']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>