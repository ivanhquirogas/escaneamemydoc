<!doctype html>
<html lang="es">

<?php
session_start();
if (isset($_POST['logout'])) {
  unset($_SESSION["username"]);
  header('Location: index.php');
}
?>

<head>
  <title>Escaneame My Doc</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
  <!-- place navbar here -->
  <div class="container-fluid bg-primary">
    <div class="row">
      <div class="col-md">
        <header class="py-2">
          <h3 class="text-center text-light">VetPet Escaneame My Doc</h3>
          <div>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
              <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Clientes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Citas</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/pages/registerPerson.php">Registro Nuevo Usuario</a></li>
                        <li><a class="dropdown-item" href="/pages/registerPet.php">Registro Nueva Mascota</a></li>
                        <li><a class="dropdown-item" href="/pages/qrcode.php">Codigo QR</a></li>
                        <!-- <li><a class="dropdown-item" href="/pages/pet.php">Lista de Mascotas</a></li>
                        <li><a class="dropdown-item" href="/pages/record.php">Historia Clinica</a></li> -->
                        <!-- <li>
                          <hr class="dropdown-divider">
                        </li> -->
                        <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                      </ul>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> -->
                  </ul>
                  <form class="d-flex" role="search" method="post">
                    <a href="../pages/login.php" class="btn btn-outline-secondary me-2">Login</a>
                    <button type="submit" name="logout" value="logout" class="btn btn-outline-secondary">Cerrar</button>
                  </form>
                </div>
              </div>
            </nav>
          </div>
        </header>
      </div>
    </div>
  </div>
</body>

</html>