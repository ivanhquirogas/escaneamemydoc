<?php include '../template/header.php' ?>
<?php include_once "../model/conexion.php";
$sentencia = $bd->query("select * from tbpaciente");
$paciente = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($paciente);
?>

<div class="container-fluid mt-3">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <!--Alerta-->
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Almacenado</strong> Registro Exitoso!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <!--Alerta-->
      <div class="card">
        <div class="card-header text-center">
          Listado de pacientes
        </div>
        <div class="p-3">
          <div class="table-responsive-xl">
            <table class="table table-primary align-middle">
              <thead>
                <tr>
                  <th scope="col"># Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Edad</th>
                  <th scope="col">Raza</th>
                  <th scope="col">Tamaño</th>
                  <th scope="col colspan=2">Opcion</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($paciente as $datos) {
                ?>
                  <tr class="">
                    <td scope="row"><?php echo $datos->Id; ?></td>
                    <td><?php echo $datos->Nombre; ?></td>
                    <td><?php echo $datos->Edad; ?></td>
                    <td><?php echo $datos->Raza; ?></td>
                    <td><?php echo $datos->Tamaño; ?></td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                  </tr>
                <?php
                }
                ?>

                <!--   <tr class="">
                                    <td scope="row">Item</td>
                                    <td>Item</td>
                                    <td>Item</td>
                                </tr> -->
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-4 ">
      <div class="card container-fluid">
        <div class="card-header">
          Ingresar paciente
        </div>
        <form action="../operations/addPet.php" class="p-2 " method="POST">
          <div class="mb-2">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="txtnombre" autofocus>
          </div>
          <div class="mb-2">
            <label class="form-label">Edad:</label>
            <input type="number" class="form-control" name="txtedad" autofocus>
          </div>
          <div class="mb-2">
            <label class="form-label">Raza:</label>
            <input type="text" class="form-control" name="txtraza" autofocus>
          </div>
          <div class="mb-2">
            <label class="form-label">Tamaño:</label>
            <input type="text" class="form-control" name="txttamaño" autofocus>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<?php include '../template/footer.php' ?>