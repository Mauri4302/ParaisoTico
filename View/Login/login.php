<!doctype html>
<html lang="es">
  <head>
    <title>Iniciar sesión - ParaisoTico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/estilo.css">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Iniciar sesión</h5>
              <form action="../../Controller/LoginController.php" method="POST">
                <!-- Campo de correo -->
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                  <label for="floatingInput">Correo electrónico</label>
                </div>
                <!-- Campo de contraseña -->
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                  <label for="floatingPassword">Contraseña</label>
                </div>

                <!-- Mostrar mensaje de error si existe -->
                <?php
                  session_start();
                  if (isset($_SESSION["Message"])) {
                      echo "<div class='alert alert-danger mt-3'>" . $_SESSION["Message"] . "</div>";
                      unset($_SESSION["Message"]); // Limpiar el mensaje después de mostrarlo
                  }
                ?>

                <!-- Botón para iniciar sesión -->
                <div class="d-grid">
                  <button class="btn btn-login" type="submit" name="btnIniciarSesion">Iniciar sesión</button>
                </div>

                <!-- Enlaces para registrar o cambiar contraseña -->
                <div class="text-center">
                  <div class="form-check mb-2">
                    <label class="form-check-label">
                      <a href="register.php" class="text-decoration-none">Crear una cuenta</a>
                    </label>
                  </div>
                  <div class="form-check mb-3">
                    <label class="form-check-label">
                      <a href="forgot_password.php" class="text-decoration-none">Cambiar contraseña</a>
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
