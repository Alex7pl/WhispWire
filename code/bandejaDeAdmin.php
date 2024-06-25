<!DOCTYPE html>
<html lang="en">
<head>

    <?php
      require 'funcionalidad.php';
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

    <!-- Gestionar los posibles errores -->

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
      <div class="col align-self-end">
        <div class="d-flex justify-content-end align-items-end" id="navBE">
          <a href="cerrarSesion.php"><button type="button" class="btn-close" aria-label="Close"></button></a>
        </div>
      </div>
    </div>
    <div class="mt-3 row">
      <div class="col-md-2">
        <div class="sidebar">
          <button type="button" id="botonR" class="btn btn-secondary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#crearUser">Crear Usuario</button>
          <!-- Modal para crear user -->
          <div class="modal fade" id="crearUser" tabindex="-1" aria-labelledby="crear" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="NM">Nuevo Usuario</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="procesar_register.php?admin=si" method="post">
                    <div class="mb-3">
                      <label for="Para" class="form-label">Usuario</label>
                      <input type="text" class="form-control" name="user" placeholder="Usuario" required autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="Asunto" class="form-label">Contraseña</label>
                      <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="mb-3">
                      <label for="Mensaje" class="form-label">Repita la contraseña</label>
                      <input type="password" class="form-control" name="passwordRep" placeholder="ContraseñaRep" required>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="bandejaEntrada">
          <form action="borrarUsuarios.php" method="post">
            <div class="mt-1 row">
              <div class="ms-2 mt-1 col-md-auto col-lg-auto">
                <p class="fs-6">Para eliminar usuarios seleccionalos de la tabla y pulsa el botón</p>
              </div>
              <div class="col">
                <button class="btn btn-secondary btn-sm" type="submit">Eliminar</button></th>
              </div>
            </div>
            <div class="row">
              <!-- Tabla para mostrar los usuarios de la app y poder eliminar los que quieras -->
              <div class="table-responsive">
                <table class="table" id="tablaAdmin">
                  <thead>
                    <tr>
                      <th>Seleccionar</th>
                      <th>Usuarios</th>
                      <th>Contraseñas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $resultado = consultarUsuarios(); ?>
                    <?php while($usuarios = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td><input type="checkbox" name="seleccion[]" value="<?php echo $usuarios['Usuario']; ?>"></td>
                        <td><?php echo $usuarios['Usuario']; ?></td>
                        <td><?php echo $usuarios['Contraseña']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>