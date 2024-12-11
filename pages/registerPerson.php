<?php include '../template/header.php' ?>
<link rel="stylesheet" href="css/main.css">
<?php include_once "../model/conexion.php";

$sentencia = $bd->query("SELECT DISTINCT (Person_Role) FROM Person");
$roles = $sentencia->fetchAll(PDO::FETCH_OBJ);
// $userconsult = $bd->query("SELECT * FROM USERS INNER JOIN PERSON ON users.Users_ID = person.Person_Users_ID_FK ORDER BY users.users_id DESC;");
//$users = $userconsult->fetchAll(PDO::FETCH_OBJ);


if (empty($_SESSION["username"])) {
  header('Location: /pages/login.php');
  exit();
}

if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'success') {
  $userconsult = $bd->prepare("SELECT * 
  FROM USERS 
  INNER JOIN PERSON ON users.Users_ID = person.Person_Users_ID_FK 
  WHERE person.Person_ID = ? 
  ORDER BY users.Users_ID DESC;
  ");
  $userconsult->execute([$_SESSION["createdUserId"]]);

  $users = $userconsult->fetchAll(PDO::FETCH_OBJ);
}
//print_r($roles);
?>

<body>
  <div class="container-fluid mt-0">
    <div class="row justify-content-center">
      <div class="col-md-12 py-2">
        <div class="card d-flex col-md-12">
          <div class="card-header text-center fw-bold fs-5">
            Ingresar Datos Nuevo Registro
            <?php
            // echo $_SESSION["username"];
            // echo $_SESSION["userId"];
            ?>
          </div>
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
          if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERROR!!</strong> USUARIO YA EXISTE!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
          }
          ?>
          <form action="/operations/registerOwner.php" method="POST">
            <div class="row mb-2">
              <div class="col-md-2">
                <label class="form-label">Rol:</label>
                <input type="text" class="form-control" name="txtrol" autofocus>
              </div>
              <div class="col-md-2">
                <label class="form-label">Cedula:</label>
                <input type="number" class="form-control" name="txtperson_id" autofocus>
              </div>
              <div class="col-md-4">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="txtnombre" autofocus>
              </div>
              <div class="col-md-4">
                <label class="form-label">Apellidos:</label>
                <input type="text" class="form-control" name="txtapellidos" autofocus>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-4">
                <label class="form-label">Correo:</label>
                <input type="text" class="form-control" name="txtcorreo" autofocus>
              </div>
              <div class="col-md-4">
                <label class="form-label">Telefono:</label>
                <input type="number" class="form-control" name="txttelefono" autofocus>
              </div>
              <div class="col-md-4">
                <label class="form-label">Ciudad:</label>
                <input type="text" class="form-control" name="txtciudad" autofocus>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-6">
                <label class="form-label">Dirección:</label>
                <input type="text" class="form-control" name="txtdireccion" autofocus>
              </div>
              <div class="col-md-3">
                <label class="form-label">Profesión:</label>
                <input type="text" class="form-control" name="txtprofesion" autofocus>
              </div>
              <div class="col-md-3">
                <label class="form-label">Estado:</label>
                <input type="text" class="form-control" name="txtestado" autofocus>
              </div>
            </div>
            <div class="justify-content-center d-grid mb-2">
              <input type="hidden" name="oculto" value="1">
              <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
          </form>
          <div id="Doc" style="display: none;">
            <div class="mb-2">
              <label class="form-label">Cedula:</label>
              <input type="number" class="form-control" name="txtperson_id" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Nombre:</label>
              <input type="text" class="form-control" name="txtnombre" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Apellidos:</label>
              <input type="text" class="form-control" name="txtapellidos" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Correo:</label>
              <input type="text" class="form-control" name="txtcorreo" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Ciudad:</label>
              <input type="text" class="form-control" name="txtciudad" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Telefono:</label>
              <input type="number" class="form-control" name="txttelefono" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Dirección:</label>
              <input type="text" class="form-control" name="txtdireccion" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Profesión:</label>
              <input type="text" class="form-control" name="txtprofesion" autofocus>
            </div>
          </div>
          <div id="Staff" style="display: none;">
            <div class="mb-2">
              <label class="form-label">Cedula:</label>
              <input type="number" class="form-control" name="txtperson_id" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Nombre:</label>
              <input type="text" class="form-control" name="txtnombre" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Apellidos:</label>
              <input type="text" class="form-control" name="txtapellidos" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Correo:</label>
              <input type="text" class="form-control" name="txtcorreo" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Telefono:</label>
              <input type="number" class="form-control" name="txttelefono" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Profesión:</label>
              <input type="text" class="form-control" name="txtprofesion" autofocus>
            </div>
          </div>
          <div id="Admin" style="display: none;">
            <div class="mb-2">
              <label class="form-label">Cedula:</label>
              <input type="number" class="form-control" name="txtperson_id" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Nombre:</label>
              <input type="text" class="form-control" name="txtnombre" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Apellidos:</label>
              <input type="text" class="form-control" name="txtapellidos" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Correo:</label>
              <input type="text" class="form-control" name="txtcorreo" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Telefono:</label>
              <input type="number" class="form-control" name="txttelefono" autofocus>
            </div>
            <div class="mb-2">
              <label class="form-label">Profesión:</label>
              <input type="text" class="form-control" name="txtprofesion" autofocus>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 container-fluid">
        <!--Alerta-->
        <div class="card d-flex col-md-12">
          <div class="card-header text-center fw-bold fs-5">
            Datos Registrados
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'success') {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡ÉXITO!</strong> El registro se ha completado correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>
          </div>
          <div class="p-1">
            <div class="table-responsive" style="height: 150px; overflow-y: scroll;">
              <table class="table table-primary align-middle">
                <thead>
                  <tr>
                    <th scope="col"># ID</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Profesión</th>
                    <th scope="col">Estado</th>
                    <th scope="col colspan=2">Opcion</th>
                    <th scope="col colspan=2">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'success') {
                    foreach ($users as $user) {
                  ?>
                      <tr class="">
                        <td scope="row"><?php echo $user->Users_ID; ?></td>
                        <td><?php echo $user->Person_Role; ?></td>
                        <td><?php echo $user->Person_ID; ?></td>
                        <td><?php echo $user->Person_Names; ?></td>
                        <td><?php echo $user->Person_Surnames; ?></td>
                        <td><?php echo $user->Person_Email; ?></td>
                        <td><?php echo $user->Person_City; ?></td>
                        <td><?php echo $user->Person_Phone; ?></td>
                        <td><?php echo $user->Person_Address; ?></td>
                        <td><?php echo $user->Person_Profession; ?></td>
                        <td><?php echo $user->Users_Status; ?></td>
                        <!-- <td>
                          <button class="btn btn-warning" type="button">
                            Editar
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-danger" onClick="deleteUser(<? echo $user->Users_ID; ?>,<? echo $user->Person_ID; ?>)" type="button">
                            Eliminar
                          </button>
                        </td> -->
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-center">
            <!-- Botón para registrar una mascota -->
            <a href="../pages/registerPet.php" class="btn btn-success">
              Registrar Mascota
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include '../template/footer.php' ?>