<?php include '../template/header.php' ?>
<link rel="stylesheet" href="css/main.css">

<main>
  <div class="container-fluid mt-0">
    <div class="row justify-content-center">
      <div class="col-md-3 py-2">
        <div class="card container-fluid">
          <!-- Formulario de Login -->
          <?php
          if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERROR!!</strong> No has completado todos los campos!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
          }
          ?>

          <?php
          if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'validos') {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERROR!!</strong> Usuario y/o Contraseña no validos!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Almacenado</strong> Registro Exitoso!!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
          }
          ?>

          <div class="card-header text-center fw-bold fs-5">
            Iniciar Sesión
          </div>
          <form action="../operations/login.php" class="p-2" method="POST">
            <div class="row mb-2">
              <input type="text" name="username" placeholder="Usuario" required>
            </div>
            <div class="row mb-2">
              <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="d-grid">
              <input type="hidden" name="oculto" value="1">
              <input type="submit" class="btn btn-primary" value="Entrar">
              <!-- <button type="submit">Entrar</button> -->
            </div>
            <a href="../pages/registerPerson.php">¿No tienes cuenta? Regístrate</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include '../template/footer.php' ?>